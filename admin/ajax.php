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