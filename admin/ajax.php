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
$query = mysqli_query($db_conn,"SELECT * FROM `accounts` WHERE `type` = '$type'");

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
$query = mysqli_query($db_conn,"SELECT * FROM `accounts` WHERE `type` = '$type' ORDER BY `$order_by` $dir LIMIT $offset,$limit ");

$i = 1;
while ($row = mysqli_fetch_object($query)) {
    $usermeta = get_user_metadata($row->id);
    $data['data'][] = [
        'serial' => '#STD-'.$row->id,
        'name' => $row->name,
        'email' =>$row->email,
        'action' => 
        '<a href="#" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
        <a href="#" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>',
    ];
}
echo json_encode($data);die;