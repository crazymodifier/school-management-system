<?php include('../includes/config.php') ?>
<?php

if(isset($_POST['class_id']) && $_POST['class_id'])
{
    $class_id = $_POST['class_id'];
    $class_meta = get_metadata($class_id,'section');
    $count = 0;
    $options = '<option value="">-Select Section-</option>';
    foreach ($class_meta as $meta){
        $section = get_post(array('id'=>$meta->meta_value));
        $options .= '<option value="'.$section->id.'">'.$section->title.'</option>';
        $count++;
    }
    $output['count'] = $count;
    $output['options'] = $options;
    echo json_encode($output);
    die;
}
$type = $_GET['user'];
$s = $_POST['search']['value'];

$sql = "SELECT * FROM `accounts` WHERE `type` = '$type'";

$sql .= " AND (`name` LIKE '%$s%'";
$s = substr($s,10);
$sql .= " OR `id` LIKE '%$s%'";
$sql .= " )";
$query = mysqli_query($db_conn,$sql);

$data = [
    "draw"=> $_POST['draw'],
    "recordsTotal"=> mysqli_num_rows($query),
    "recordsFiltered"=> mysqli_num_rows($query),
    "data" => []
];

$limit = $_POST['length'];
$offset = $_POST['start'];
$column = $_POST['order'][0]['column'];
$dir = $_POST['order'][0]['dir'];
$order_by = ($column == 0)? 'id': $_POST['columns'][$column]['data'];

$sql .=  " ORDER BY `$order_by` $dir LIMIT $offset,$limit";
$query = mysqli_query($db_conn,$sql);
// $data['data'] = $sql;
$i = 1;

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
WHERE c.meta_key = 'class' AND s.meta_key = 'section' AND d.meta_key = 'dob' AND da.meta_key = 'doa' AND f.meta_key = 'father_name' AND m.meta_key = 'mother_name' AND ad.meta_key = 'address'";
$query = mysqli_query($db_conn,$sql);

switch ($type) {
    case 'student':
        while ($row = mysqli_fetch_object($query)) {
            $usermeta = get_user_metadata($row->id);
            $class = get_post(array('id'=> $usermeta['class']))->title;
            $section = get_post(array('id'=> intval($usermeta['section'])))->title;
            $class = 'Class-'.$class.' ('.$section.')';
            $data['data'][] = [
                'enroll' => 'E-'.date('Y',strtotime($usermeta['doa'])).date('dm',strtotime($usermeta['dob'])).$row->id,
                'class' => $class,
                'photo' => '<img class="border" src="http://localhost/sms-project/dist/img/AdminLTELogo.png" width="40" height="40">',
                'name' => $row->name,
                'dob' =>$row->dob,
                'father_name' =>$usermeta['father_name'],
                'mother_name' =>$usermeta['mother_name'],
                'doa' =>$usermeta['doa'],
                'address' =>$usermeta['address'],
                'action' => 
                '<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>',
            ];
        }
        break;
    case 'teacher':
        while ($row = mysqli_fetch_object($query)) {
            $data['data'][] = [
                'emp_id' => 'E-'.$row->id,
                'photo' => '<img class="border" src="http://localhost/sms-project/dist/img/AdminLTELogo.png" width="40" height="40">',
                'name' => $row->name,
                'subjects' =>$row->name,
                'doj' =>$row->name,
                'address' =>$row->name,
                'action' => 
                '<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>',
            ];
        }
        break;
    case 'parent':
        while ($row = mysqli_fetch_object($query)) {
            $data['data'][] = [
                'name' => $row->name,
                'children' =>$row->name,
                'address' =>$sql,
                'action' => 
                '<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                <a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>',
            ];
        }
        break;
    default:
        $data['data'] = [];
        break;
}
// }
echo json_encode($data);die;