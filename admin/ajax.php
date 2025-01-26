<?php include('../includes/config.php') ?>
<?php

if (isset($_POST['class_id']) && $_POST['class_id']) {
    $class_id = $_POST['class_id'];
    $class_meta = get_metadata($class_id, 'section');
    $count = 0;
    $options = '<option value="">-Select Section-</option>';
    foreach ($class_meta as $meta) {
        $section = get_post(array('id' => $meta->meta_value));
        $options .= '<option value="' . $section->id . '">' . $section->title . '</option>';
        $count++;
    }
    $output['count'] = $count;
    $output['options'] = $options;
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
            $args = array('type' => 'student');
            $result = get_users($args,false);
            $enrs = substr($s,8);

            foreach ($result as $key => $value) {
                
                $usermeta = get_user_metadata($value['id']);
                $class = get_post(array('id'=> $usermeta['class']))->title;
                $section = get_post(array('id'=> intval($usermeta['section'])))->title;
                $class = $class.' ('.$section.')';
                $img = !empty($usermeta['photo']) ? '<img class="border" src="../dist/uploads/student-docs/'.$usermeta['photo'].'" width="40" height="40">':'<img class="border" src="../dist/img/AdminLTELogo.png" width="40" height="40">';
                $data['data'][] = [
                    'enroll' => isset($usermeta['enrollment_no']) ? $usermeta['enrollment_no'] : 0,
                    'class' => $class,
                    'photo' => $img,
                    'name' => $value['name'],
                    'dob' =>$usermeta['dob'],
                    'father_name' =>$usermeta['father_name'],
                    'mother_name' =>$usermeta['mother_name'],
                    'doa' =>$usermeta['doa'],
                    'address' =>$usermeta['address'],
                    'action' => 
                    '<a href="user-account.php?user=student&action=view&id='.$value['id'].'" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="user-account.php?user=student&action=edit&id='.$value['id'].'" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                    <a href="user-account.php?user=student&action=trash&id='.$value['id'].'" class="btn btn-sm btn-danger trash-user"><i class="fa fa-trash"></i></a>',
                ];
            }
            break;
        case 'teacher':

            $args = array('type' => 'teacher');
            $result = get_users($args,false);
            foreach ($result as $key => $value) {
                $usermeta = get_user_metadata($value['id']);
                $subjects = unserialize($usermeta['subjects']);
                $subject_data = '';
                if(is_array($subjects)){
                    foreach ($subjects as $subject) {
                        // $child = get_userdata($chid_id);
                        $result = mysqli_fetch_array(mysqli_query($db_conn, "SELECT `title` FROM `posts` WHERE id = $subject"), MYSQLI_ASSOC);
                        if($result){
                            $subject_data .= '<a class="btn btn-sm btn-default mr-2">'.$result['title'].'</a>';
                        }
    
                    }
                }
                $teaching_areas = unserialize($usermeta['teaching_area']);
                $teaching_area_data = '';
                if(is_array($teaching_areas)){
                    foreach ($teaching_areas as $teaching_area) {
                        $teaching_area_data .= '<a class="btn btn-sm btn-default mr-2">'.$teaching_area.'</a>';
                    }
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
