<?php 
include('../includes/config.php');

if(isset($_POST['type']) && $_POST['type'] == 'student' && isset($_POST['email']) && !empty($_POST['email']))
{
    $name = isset($_POST['name'])?$_POST['name']:'';
    $dob = isset($_POST['dob'])?$_POST['dob']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $address = isset($_POST['address'])?$_POST['address']:'';
    $country = isset($_POST['country'])?$_POST['country']:'';
    $state = isset($_POST['state'])?$_POST['state']:'';
    $zip = isset($_POST['zip'])?$_POST['zip']:'';
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
    $type = isset($_POST['type'])?$_POST['type']:'';
    $date_add = date('Y-m-d');

    $payment_method = isset($_POST['payment_method'])?$_POST['payment_method']:'';

    $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");
    if(mysqli_num_rows($check_query) > 0)
    {
        // $error = 'Email already exists';
        echo 'Email already exists';die;
    }
    else
    {    
        $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$md_password','$type')") or die(mysqli_error($db_conn));
        if($query)
        {
            $user_id = mysqli_insert_id($db_conn);
        }
    }

    $usermeta = array(
        'dob' => $dob,
        'mobile' => $mobile,
        'payment_method' => $payment_method,
        'class' => $class,
        'address' => $address,
        'country' => $country,
        'state' => $state,
        'zip' => $zip,
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
    );

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


    // Parent registration
    $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$father_mobile'");
    if(mysqli_num_rows($check_query) > 0)
    {
        $parent = mysqli_fetch_object(mysqli_query($db_conn,"SELECT * FROM `accounts` as a JOIN `usermeta` as m ON a.id = m.user_id WHERE a.type = 'parent' AND a.email = '$father_mobile' AND m.meta_key = 'children';"));
        // $error = 'Email already exists';
        // echo 'Email already exists';die;
        $children = unserialize($parent->meta_value);
        $children[] = $user_id;
        $children = serialize($children);
        $query = mysqli_query($db_conn, "UPDATE `usermeta` SET `meta_value` = '$children' WHERE meta_key = 'children' ")or die(mysqli_error($db_conn));;
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

    $response = array(
        'success' => TRUE,
        'payment_method' => $payment_method,
        'std_id' => $user_id
    );
    echo json_encode($response);die;
}

?>