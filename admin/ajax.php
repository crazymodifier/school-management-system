<?php include('../includes/config.php') ?>
<?php

if(isset($_GET['action']) && 'get_user_attendance' == $_GET['action']){

    $monthNum = isset($_GET['month'])?$_GET['month']:date('m');
    $month = strtolower(date('F', mktime(0, 0, 0, $monthNum, 10))); 
    $user_id = isset($_GET['user_id'])?$_GET['user_id']:45;
    $year = isset($_GET['year'])?$_GET['year']:date('Y');
    $query = mysqli_query($db_conn,"SELECT * FROM `attendance` WHERE attendance_month = '$month' AND std_id = '{$user_id}' AND YEAR(current_session) = $year");
    $data = mysqli_fetch_array($query);
    
    $data = unserialize($data['attendance_value']);
    $output = [];
    foreach ($data as $key => $value) {
        
        if($value['signin_at']){

            // $date = date('Y-m-d', );
    
            $output[] = [
                'date' => $year.'-'.$monthNum.'-'.$key,
                'markup' => "[day]<span class=\"badge badge-sm rounded-pill px-2 bg-success\" style=\"font-size:12px\">P</span>"
            ];
        }
    
    }
    echo json_encode($output);
    die;
}
if(isset($_GET['action']) && 'get_user_by_type' == $_GET['action']){

    $query = mysqli_query($db_conn, "SELECT a.name, a.id , (SELECT `title` FROM `posts` WHERE id = cm.meta_value) as class FROM `accounts` as a JOIN `usermeta` as cm ON cm.user_id = a.id WHERE  cm.meta_key = 'class' AND `type` = '{$_GET['type']}' AND `name` LIKE '%{$_GET['q']}%'");

    $output = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $output[] = [
            'id' => $row['id'],
            'text' => $row['name'] .' - '.$row['class']
        ];    
    }
    echo json_encode($output);
    die;
}

if(isset($_POST['class_id']) && $_POST['class_id'])
{
    $class_id = $_POST['class_id'];
    $sections = _get_post_metadata($class_id,'sections',1);
    $sections = unserialize($sections);
    $count = 0;
    $section_options = '<option value="">-Select Section-</option>';
    foreach ($sections as $value){
        $section = _get_post($value);
        $section_options .= '<option value="'.$section->id.'">'.$section->title.'</option>';
        $count++;
    }
    $output['count'] = $count;
    $output['section_options'] = $section_options;

    $count = 0;
    $subjects = _get_post_metadata($class_id,'subjects',1);
    $subjects = unserialize($subjects);
    $subject_options = '<option value="">-Select Subject-</option>';
    foreach ($subjects as $value){
        $subject = _get_post($value);
        $subject_options .= '<option value="'.$subject->id.'">'.$subject->title.'</option>';
        $count++;
    }
    $output['count'] = $count;
    $output['section_options'] = $section_options;
    $output['subject_options'] = $subject_options;
    echo json_encode($output);
    die;
}

if(isset($_POST['teacher_id']) && $_POST['teacher_id'])
{

    $zones = get_usermeta($_POST['teacher_id'],'teaching_area',1);
    $zones = unserialize($zones);
    $classes = [];
    foreach ($zones as $key => $value) {

        $result = mysqli_query($db_conn, "SELECT * FROM `metadata` WHERE `meta_key` = 'zone' AND `meta_value` = '$value'");

        while ($row = mysqli_fetch_object($result)) {
            $classes[] = $row->item_id;
        }
        
    }
    $count = 0;
    $options = '<option value="">-Select Class-</option>';
    foreach ($classes as $value){
        $classe = _get_post($value);
        $options .= '<option value="'.$classe->id.'">'.$classe->title.'</option>';
        $count++;
    }
    $output['count'] = $count;
    $output['options'] = $options;
    // echo json_encode($output);
    echo json_encode($output);
    die;

}
if(!empty($_GET['action']) && 'get_users_details' == $_GET['action']){

    $limit = $_POST['length'];
    $offset = $_POST['start'];
    $column = $_POST['order'][0]['column'];
    $dir = $_POST['order'][0]['dir'];
    $s = $_POST['search']['value'];
    $order_by = ($column == 0)? 'id': $_POST['columns'][$column]['data'];

    $data = [
        "draw"=> $_POST['draw'],
        "recordsTotal"=> 0,
        "recordsFiltered"=> 0,
        "data" => []
    ];

    $type = $_GET['user'];

    switch ($type) {
        case 'student':
            $enrs = substr($s,8);
            $sql = "SELECT 
                a.id,
                a.name,
                c.meta_value as `class_id`, 
                s.meta_value as `sec_id`, 
                d.meta_value as `dob`,
                da.meta_value as `doa`,
                f.meta_value as `father_name`,
                m.meta_value as `mother_name`,
                ad.meta_value as `address`
                FROM `accounts` as a 

                JOIN `usermeta` as c ON c.user_id = a.id 
                JOIN `usermeta` as s ON s.user_id = a.id 
                JOIN `usermeta` as d ON d.user_id = a.id
                JOIN `usermeta` as da ON da.user_id = a.id 
                JOIN `usermeta` as f ON f.user_id = a.id
                JOIN `usermeta` as m ON m.user_id = a.id
                JOIN `usermeta` as ad ON ad.user_id = a.id
                WHERE a.type = '$type' AND c.meta_key = 'class' AND s.meta_key = 'section' AND d.meta_key = 'dob' AND da.meta_key = 'doa' AND f.meta_key = 'father_name' AND m.meta_key = 'mother_name' AND ad.meta_key = 'address' ";
                $data['recordsTotal'] = mysqli_num_rows(mysqli_query($db_conn,$sql));
                $sql .= "AND (c.meta_value LIKE '%$s%' OR a.name LIKE '%$s%' OR f.meta_value LIKE '%$s%' OR a.id = '$enrs')";
                $data['recordsFiltered'] = mysqli_num_rows(mysqli_query($db_conn,$sql));
                $sql .=  " ORDER BY `$order_by` $dir LIMIT $offset,$limit";
            $query = mysqli_query($db_conn,$sql);

            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

            foreach ($result as $key => $value) {
                $class = get_post(array('id'=> $value['class_id']))->title;
                $section = get_post(array('id'=> intval($value['sec_id'])))->title;
                $class = $class.' ('.$section.')';
                $usermeta = get_user_metadata($value['id']);
                $img = !empty($usermeta['photo']) ? '<img class="border" src="../dist/uploads/student-docs/'.$usermeta['photo'].'" width="40" height="40">':'<img class="border" src="../dist/img/AdminLTELogo.png" width="40" height="40">';
                $data['data'][] = [
                    'enroll' => $usermeta['enrollment_no'],
                    'class' => $class,
                    'photo' => $img,
                    'name' => $value['name'],
                    'dob' =>$value['dob'],
                    'father_name' =>$value['father_name'],
                    'mother_name' =>$value['mother_name'],
                    'doa' =>$value['doa'],
                    'address' =>$value['address'],
                    'action' => 
                    '<a href="user-account.php?user=student&action=view&id='.$value['id'].'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="user-account.php?user=student&action=edit&id='.$value['id'].'" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                    <a href="user-account.php?user=student&action=trash&id='.$value['id'].'" class="btn btn-sm btn-danger trash-user"><i class="fa fa-trash"></i></a>',
                ];
            }
            break;
        case 'teacher':

            $sql = "SELECT 
                a.id,
                a.name
                FROM `accounts` as a 
                WHERE a.type = '$type' 
                ";
            $query = mysqli_query($db_conn,$sql);

            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $key => $value) {
                $usermeta = get_user_metadata($value['id']);
                $subjects = unserialize($usermeta['subjects']);
                $subject_data = '';
                foreach ($subjects as $subject) {
                    // $child = get_userdata($chid_id);
                    $result = mysqli_fetch_array(mysqli_query($db_conn, "SELECT `title` FROM `posts` WHERE id = $subject"), MYSQLI_ASSOC);
                    if($result){
                        $subject_data .= '<a class="btn btn-sm btn-default mr-2">'.$result['title'].'</a>';
                    }

                }
                $teaching_areas = unserialize($usermeta['teaching_area']);
                $teaching_area_data = '';
                foreach ($teaching_areas as $teaching_area) {
                    $teaching_area_data .= '<a class="btn btn-sm btn-default mr-2">'.$teaching_area.'</a>';
                }
                $img = !empty($usermeta['photo']) ? '<img class="border" src="../dist/uploads/teacher-docs/'.$usermeta['photo'].'" width="40" height="40">':'<img class="border" src="../dist/img/AdminLTELogo.png" width="40" height="40">';
                $data['data'][] = [
                    'emp_id' => (isset($usermeta['emp_id'])? $usermeta['emp_id']:''),
                    'photo' => $img,
                    'name' => $value['name'],
                    'subjects' => $subject_data,
                    'zone' => $teaching_area_data,
                    'doj' => (isset($usermeta['doj'])? date('d-m-Y', strtotime($usermeta['doj'])):''),
                    'address' => isset($usermeta['address'])?$usermeta['address']:'',
                    'action' => 
                    '<a href="user-account.php?user=teacher&action=view&id='.$value['id'].'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="user-account.php?user=teacher&action=edit&id='.$value['id'].'" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                    <a href="user-account.php?user=teacher&action=trash&id='.$value['id'].'" class="btn btn-sm btn-danger trash-user"><i class="fa fa-trash"></i></a>',
                ];
            }
            
            break;
        case 'parent':

            $sql = "SELECT * FROM `accounts` as a WHERE a.type = '$type' ";
            $query = mysqli_query($db_conn,$sql);

            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            foreach ($result as $key => $value) {
                $usermeta = get_user_metadata($value['id']);
                $children = unserialize($usermeta['children']);
                $children_data = '';
                foreach ($children as $chid_id) {
                    // $child = get_userdata($chid_id);
                    $child = mysqli_fetch_array(mysqli_query($db_conn, "SELECT `name` FROM `accounts` WHERE id = $chid_id"), MYSQLI_ASSOC);
                    if($child){
                        $children_data .= '<a href="user-account.php?user=student&action=view&id='.$chid_id.'" class="btn btn-sm btn-default mr-2">'.$child['name'].'</a>';
                    }

                }
                $data['data'][] = [
                    'name' => $value['name'],
                    'children' => $children_data,
                    'address' =>isset($usermeta['address'])?$usermeta['address']:'',
                    'action' => 
                    '<a href="user-account.php?user=parent&action=view&id='.$value['id'].'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="user-account.php?user=parent&action=edit&id='.$value['id'].'" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                    <a href="user-account.php?user=parent&action=trash&id='.$value['id'].'" class="btn btn-sm btn-danger trash-user"><i class="fa fa-trash"></i></a>',
                ];
            }
            
            break;
        default:
            # code...
            break;
    }
  
    echo json_encode($data);
    die;
}

// Teacher Registration
if(isset($_POST['type']) && $_POST['type'] == 'teacher')
{
    $uploadOk =1;
    $user_id = !empty($_POST['user_id'])? $_POST['user_id'] : 0;

    $result = mysqli_query($db_conn, "SELECT id FROM `accounts` WHERE `type` = 'teacher'")->num_rows;

    $emp_id = $result+1;
   
    $target_dir = "../dist/uploads/teacher-docs/";
    
    $name = isset($_POST['name'])?$_POST['name']:'';
    $dob = isset($_POST['dob'])?$_POST['dob']:'';
    $gender = isset($_POST['gender'])?$_POST['gender']:'';
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $father_name = isset($_POST['father_name'])?$_POST['father_name']:'';
    $address = isset($_POST['address'])?$_POST['address']:'';
    $country = isset($_POST['country'])?$_POST['country']:'';
    $state = isset($_POST['state'])?$_POST['state']:'';
    $zip = isset($_POST['zip'])?$_POST['zip']:'';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $religion = isset($_POST['religion']) ? $_POST['religion'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $aadhar_number = isset($_POST['aadhar_number']) ? $_POST['aadhar_number'] : '';

    $doj = isset($_POST['doj'])?$_POST['doj']:'';
    $salary = isset($_POST['salary'])?$_POST['salary']:'';
    $upi = isset($_POST['upi'])?$_POST['upi']:'';
    $bank_name = isset($_POST['bank_name'])?$_POST['bank_name']:'';
    $ac_holder_name = isset($_POST['ac_holder_name'])?$_POST['ac_holder_name']:'';
    $account_number = isset($_POST['account_number'])?$_POST['account_number']:'';
    $ifsc_code = isset($_POST['ifsc_code'])?$_POST['ifsc_code']:'';

    $password = date('dmY',strtotime($dob));
    $md_password = md5($password);

    $subjects = isset($_POST['subjects'])?serialize($_POST['subjects']):'';
    $teaching_area = isset($_POST['teaching_area'])?serialize($_POST['teaching_area']):'';
    
    $emp_id = isset($_POST['emp_id'])? $_POST['emp_id']  : date('Y', strtotime($doj)).date('dm', strtotime($dob)).sprintf('%03d',$emp_id);
    $usermeta = [];
    foreach ($_FILES['documention']['name'] as $key => $value) {
        // Check file size
        if($value){
            if ($_FILES["documention"]["size"][$key] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            $imageFileType = strtolower(pathinfo(basename($_FILES["documention"]["name"][$key]),PATHINFO_EXTENSION));
            $target_file = $target_dir.''.$emp_id.'_'.$key.'.'.$imageFileType;
            if($uploadOk){
                move_uploaded_file($_FILES["documention"]["tmp_name"][$key], $target_file);
            }
            $usermeta[$key] = $emp_id.'_'.$key.'.'.$imageFileType;
        }
        
    }

    $date_add = date('Y-m-d');
    $usermeta += array(
        'dob' => $dob,
        'mobile' => $mobile,
        'address' => $address,
        'country' => $country,
        'state' => $state,
        'zip' => $zip,
        'gender' => $gender,
        'religion' => $religion,
        'category' => $category,
        'aadhar_number' => $aadhar_number,
        'father_name' => $father_name,
        'doj' => $doj,
        'salary' => $salary,
        'upi' => $upi,
        'ac_holder_name' => $ac_holder_name,
        'account_number' => $account_number,
        'ifsc_code' => $ifsc_code,
        'bank_name' => $bank_name,
        'subjects' => $subjects,
        'teaching_area' => $teaching_area,
        'emp_id'    => $emp_id
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
        $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$md_password','teacher')") or die(mysqli_error($db_conn));
        if($query)
        {
            $user_id = mysqli_insert_id($db_conn);
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
    

    
    $response = $usermeta;
    echo json_encode($response);die;
}