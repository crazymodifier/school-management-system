<?php 
include('../includes/config.php');




if(isset($_POST['type']) && $_POST['type'] == 'student')
{
    $uploadOk =1;
    $user_id = !empty($_POST['user_id'])? $_POST['user_id'] : 0;
    
    $result = mysqli_query($db_conn, "SELECT id FROM `accounts` WHERE `type` = 'student'")->num_rows;
    $std_enroll = $result+1;
    
    $target_dir = "../dist/uploads/student-docs/";
    
    $name = isset($_POST['name'])?$_POST['name']:'';
    $dob = isset($_POST['dob'])?$_POST['dob']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $address = isset($_POST['address'])?$_POST['address']:'';
    $country = isset($_POST['country'])?$_POST['country']:'';
    $state = isset($_POST['state'])?$_POST['state']:'';
    $zip = isset($_POST['zip'])?$_POST['zip']:'';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $religion = isset($_POST['religion']) ? $_POST['religion'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    
    $password = date('dmY',strtotime($dob));
    $md_password = md5($password);
    
    $father_name = isset($_POST['father_name'])?$_POST['father_name']:'';
    $father_mobile = isset($_POST['father_mobile'])?$_POST['father_mobile']:'';
    $mother_name = isset($_POST['mother_name'])?$_POST['mother_name']:'';
    $mother_mobile = isset($_POST['mother_mobile'])?$_POST['mother_mobile']:'';
    $parents_address = isset($_POST['parents_address'])?$_POST['parents_address']:'';
    $parents_country = isset($_POST['parents_country'])?$_POST['parents_country']:'';
    $parents_state = isset($_POST['parents_state'])?$_POST['parents_state']:'';
    $parents_zip = isset($_POST['parents_zip'])?$_POST['parents_zip']:'';
    
    $school_name = isset($_POST['school_name'])?$_POST['school_name']:'';
    $previous_class = isset($_POST['previous_class'])?$_POST['previous_class']:'';
    $status = isset($_POST['status'])?$_POST['status']:'';
    $total_marks = isset($_POST['total_marks'])?$_POST['total_marks']:'';
    $obtain_mark = isset($_POST['obtain_mark'])?$_POST['obtain_mark']:'';
    $previous_percentage = isset($_POST['previous_percentage'])?$_POST['previous_percentage']:'';
    
    $class = isset($_POST['class'])?$_POST['class']:'';
    $section = isset($_POST['section'])?$_POST['section']:'';
    $subject_streem = isset($_POST['subject_streem'])?$_POST['subject_streem']:'';
    $doa = isset($_POST['doa'])?$_POST['doa']:'';
    
    $std_enroll = isset($_POST['enrollment_no'])? $_POST['enrollment_no']  : date('Y', strtotime($doa)).date('dm', strtotime($dob)).sprintf('%06d',$std_enroll);
    $usermeta = [];
    foreach ($_FILES['documention']['name'] as $key => $value) {
        // Check file size
        if($_FILES["documention"]["name"][$key]){
            if ($_FILES["documention"]["size"][$key] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            $imageFileType = strtolower(pathinfo(basename($_FILES["documention"]["name"][$key]),PATHINFO_EXTENSION));
            $target_file = $target_dir.''.$std_enroll.'_'.$key.'.'.$imageFileType;
            if($uploadOk){
                move_uploaded_file($_FILES["documention"]["tmp_name"][$key], $target_file);
            }
    
            $usermeta[$key] = $std_enroll.'_'.$key.'.'.$imageFileType;
        }
        
    }

    $type = isset($_POST['type'])?$_POST['type']:'';
    $date_add = date('Y-m-d');
    
    $payment_method = isset($_POST['payment_method'])?$_POST['payment_method']:'';

    
    
    $usermeta += array(
        'dob' => $dob,
        'mobile' => $mobile,
        'payment_method' => $payment_method,
        'class' => $class,
        'address' => $address,
        'country' => $country,
        'state' => $state,
        'zip' => $zip,
        'gender' => $gender,
        'religion' => $religion,
        'category' => $category,
        'father_name' => $father_name,
        'father_mobile' => $father_mobile,
        'mother_name' => $mother_name,
        'mother_mobile' => $mother_mobile,
        'parents_address' => $parents_address,
        'parents_country' => $parents_country,
        'parents_state' => $parents_state,
        'parents_zip' => $parents_zip,
        'school_name' => $school_name,
        'previous_class' => $previous_class,
        'status' => $status,
        'total_marks' => $total_marks,
        'obtain_mark' => $obtain_mark,
        'previous_percentage' => $previous_percentage,
        'section' => $section,
        'subject_streem' => $subject_streem,
        'doa' => $doa,
        'enrollment_no' => $std_enroll,
    );
    

    
    if($user_id)
    {  
        foreach ($usermeta as $key => $value) {

            $check_query = mysqli_query($db_conn, "SELECT * FROM `usermeta` WHERE `user_id` = $user_id AND `meta_key`='$key'");

            if(mysqli_num_rows($check_query)>0){

                mysqli_query($db_conn, "UPDATE `usermeta` SET `meta_value`='$value' WHERE `user_id` = $user_id AND `meta_key`='$key'") or die(mysqli_error($db_conn));
            }
            else{
                mysqli_query($db_conn, "INSERT INTO usermeta (`user_id`,`meta_key`,`meta_value`) VALUES ('$user_id','$key','$value')") or die(mysqli_error($db_conn));
            }
        }
        $_SESSION['success_msg'] = 'User has been succefuly updated';
    }
    else
    {    
        $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$md_password','$type')") or die(mysqli_error($db_conn));
        if($query)
        {
            $user_id = mysqli_insert_id($db_conn);
        }

        // Parent registration
        $check_query = mysqli_query($db_conn, "SELECT * FROM `accounts` as a JOIN `usermeta` as m ON a.id = m.user_id WHERE a.type = 'parent' AND ( email = '$father_mobile' OR (m.meta_key = 'mobile' AND m.meta_value = '$father_mobile' ) )");
        
        if(mysqli_num_rows($check_query) > 0)
        {
            $parent = mysqli_fetch_assoc($check_query);
            $parent_id = $parent['user_id'];
            $parent = get_user_data($parent_id,false);
            $children = unserialize($parent['children']);
            $children[] = $user_id;
            $children = serialize($children);
            $query = mysqli_query($db_conn, "UPDATE `usermeta` SET `meta_value` = '$children' WHERE meta_key = 'children' AND user_id = $parent_id")or die(mysqli_error($db_conn));;
        }
        else
        {    
            $md_password = md5($father_mobile);
            $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$father_name','$father_mobile','$md_password','parent')") or die(mysqli_error($db_conn));
            if($query)
            {
                $parent_id = mysqli_insert_id($db_conn);
            }
            $chld = [$user_id];
            $chld = serialize($chld);
            mysqli_query($db_conn, "INSERT INTO usermeta (`user_id`,`meta_key`,`meta_value`) VALUES ('$parent_id','children','$chld')") or die(mysqli_error($db_conn));
        }

        

        foreach ($usermeta as $key => $value) {
            mysqli_query($db_conn, "INSERT INTO usermeta (`user_id`,`meta_key`,`meta_value`) VALUES ('$user_id','$key','$value')") or die(mysqli_error($db_conn));
        }
    
        $months = array('january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
    
        $att_data = [];
        for ($i=1; $i <= 31; $i++) { 
            $att_data[$i] = [
                'signin_at' => '',
                'signout_at' => '',
                'date' => $i
            ];
        }
        $att_data = serialize($att_data);
        foreach ($months as $key => $value) {
            mysqli_query($db_conn, "INSERT INTO `attendance` (`attendance_month`,`attendance_value`,`std_id`) VALUES ('$value','$att_data','$user_id')") or die(mysqli_error($db_conn));
        }
        
        $_SESSION['success_msg'] = 'User has been succefuly registered';
    
        
    }
    

    $response = array(
        'success' => TRUE,
        'std_id' => $user_id
    );
    echo json_encode($usermeta);die;
}

?>