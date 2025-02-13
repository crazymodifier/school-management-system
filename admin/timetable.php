<?php include('../includes/config.php') ?>

<?php

$post_id = isset($_GET['id']) ? $_GET['id'] : '';
$metadata = [
    'class_id' => 0,
    'section_id' => 0,
    'teacher_id' => 0,
    'period_id' => 0,
    'day_name' => '',
];
$metadata = (object) $metadata;
if ($post_id) {
    $metadata = get_metadata($post_id);
}
if (isset($_POST['submit'])) {
    $class_id = isset($_POST['class_id']) ? $_POST['class_id'] : '';
    $section_id = isset($_POST['section_id']) ? $_POST['section_id'] : '';
    $teacher_id = isset($_POST['teacher_id']) ? $_POST['teacher_id'] : '';
    $period_id = isset($_POST['period_id']) ? $_POST['period_id'] : '';
    $day_name = isset($_POST['day_name']) ? $_POST['day_name'] : '';
    $subject_id = isset($_POST['subject_id']) ? $_POST['subject_id'] : '';
    $item_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';
    $date_add = date('Y-m-d g:i:s');
    $status = 'publish';
    $author = 1;
    $type = 'timetable';
    if (!$item_id) {
        $query = mysqli_query($db_conn, "INSERT INTO `posts`(`author`, `title`, `description`, `type`, `status`,`parent`) VALUES ('1','$type','description','timetable','publish',0)") or die('DB error');
        if ($query) {
            $item_id = mysqli_insert_id($db_conn);
        }
    }
    $metadata = array(
        'class_id' => $class_id,
        'section_id' => $section_id,
        'teacher_id' => $teacher_id,
        'period_id' => $period_id,
        'day_name' => $day_name,
        'subject_id' => $subject_id,
    );

    foreach ($metadata as $key => $value) {
        mysqli_query($db_conn, "INSERT INTO metadata (`item_id`,`meta_key`,`meta_value`) VALUES ('$item_id','$key','$value')");
    }

    header('Location: timetable.php');
}
?>

<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<?php
$class_id = isset($_GET['class']) ? $_GET['class'] : 0;
$section_id = isset($_GET['section']) ? $_GET['section'] : 0;
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Time Table

                    <a href="?action=add" class="btn btn-success btn-sm"> Add New</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Time Table</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) { ?>

            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg">
                                <div class="form-group">
                                    <label for="class_id">Select Class</label>
                                    <select require name="class_id" id="class_id" class="form-control">
                                        <option value="">-Select Class-</option>
                                        <?php
                                        $args = array(
                                            'type' => 'class',
                                            'status' => 'publish',
                                        );
                                        $classes = get_posts($args);
                                        foreach ($classes as $key => $class) {
                                            $selected = ($class->id == $metadata->class_id) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $class->id ?>" <?php echo $selected ?>><?php echo $class->title ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="section_id">Select Section</label>
                                    <select require name="section_id" id="section_id" class="form-control">
                                        <option value="">-Select Section-</option>
                                        <?php
                                        $class_meta = get_metadata($metadata->class_id, 'sections')[0]->meta_value;
                                        $class_meta = unserialize($class_meta);
                                        foreach ($class_meta as $meta) {
                                            $section = get_post(array('id' => $meta));
                                            $selected = ($section->id == $metadata->section_id) ? 'selected' : '';
                                            $options .= '<option value="' . $section->id . '" ' . $selected . '>' . $section->title . '</option>';
                                        }
                                        echo $options;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="teacher_id">Select Teacher</label>
                                    <select require name="teacher_id" id="teacher_id" class="form-control">
                                        <option value="">-Select Teacher-</option>
                                        <?php
                                        $teachers = get_users(array('type' => 'teacher'));
                                        foreach ($teachers as $key => $teacher) {
                                            $selected = ($teacher->id == $metadata->teacher_id) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $teacher->id ?>" <?php echo $selected ?>><?php echo $teacher->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="period_id">Select Period</label>
                                    <select require name="period_id" id="period_id" class="form-control">
                                        <option value="">-Select Period-</option>
                                        <?php
                                        $args = array(
                                            'type' => 'period',
                                            'status' => 'publish',
                                        );
                                        $periods = get_posts($args);
                                        foreach ($periods as $key => $period) {
                                            $selected = ($period->id == $metadata->period_id) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $period->id ?>" <?php echo $selected ?>><?php echo $period->title ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="day_name">Select Day</label>
                                    <select require name="day_name" id="day_name" class="form-control">
                                        <option value="">-Select Day-</option>

                                        <?php
                                        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                        foreach ($days as $key => $day) {
                                            $selected = ($day == $metadata->day_name) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $day ?>" <?php echo $selected ?>><?php echo ucwords($day) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-group" id="section-container">
                                    <label for="subject_id">Select Subject</label>
                                    <select require name="subject_id" id="subject_id" class="form-control">
                                        <option value="">-Select Subject-</option>
                                        <?php
                                        $args = array(
                                            'type' => 'subject',
                                            'status' => 'publish',
                                        );
                                        $subjects = get_posts($args);
                                        foreach ($subjects as $key => $subject) {
                                            $selected = ($subject->id == $metadata->subject_id) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $subject->id ?>" <?php echo $selected ?>><?php echo $subject->title ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="from-group">
                                    <label for="">&nbsp;</label>
                                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                    <input type="submit" value="submit" name="submit" class="btn btn-success form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <?php } else { ?>

            <form action="" method="get">

                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <select name="class" id="class" class="form-control">
                                <option value="">Select Class</option>
                                <?php
                                $args = array(
                                    'type' => 'class',
                                    'status' => 'publish',
                                );
                                $classes = get_posts($args);
                                foreach ($classes as $class) {
                                    $selected = ($class_id ==  $class->id) ? 'selected' : '';
                                    echo '<option value="' . $class->id . '" ' . $selected . '>' . $class->title . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group" id="section-container">
                            <select name="section" id="section" class="form-control">
                                <option value="">Select Section</option>
                                <?php
                                $args = array(
                                    'type' => 'section',
                                    'status' => 'publish',
                                );
                                $sections = get_posts($args);
                                foreach ($sections as $section) {
                                    $selected = ($section_id ==  $section->id) ? 'selected' : '';
                                    echo '<option value="' . $section->id . '" ' . $selected . '>' . $section->title . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>

            </form>
            <?php if (!empty($_GET['class']) && !empty($_GET['section'])) {?>
                <div class="card">

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Timing</th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $args = array(
                                    'type' => 'period',
                                    'status' => 'publish',
                                );
                                $periods = get_posts($args);

                                foreach ($periods as $period) {
                                    $from = get_metadata($period->id, 'from')[0]->meta_value;

                                    $to = get_metadata($period->id, 'to')[0]->meta_value;
                                ?>
                                    <tr>
                                        <td><?php echo date('h:i A', strtotime($from)) ?> - <?php echo date('h:i A', strtotime($to)) ?></td>
                                        <?php

                                        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

                                        foreach ($days as $day) {
                                            $query = mysqli_query($db_conn, "SELECT * FROM posts as p 
                                    INNER JOIN metadata as md ON (md.item_id = p.id) 
                                    INNER JOIN metadata as mp ON (mp.item_id = p.id) 
                                    INNER JOIN metadata as mc ON (mc.item_id = p.id) 
                                    INNER JOIN metadata as ms ON (ms.item_id = p.id) 
                                    WHERE p.type = 'timetable' AND p.status = 'publish' AND md.meta_key = 'day_name' AND md.meta_value = '$day' AND mp.meta_key = 'period_id' AND mp.meta_value = $period->id AND mc.meta_key = 'class_id' AND mc.meta_value = $class_id AND ms.meta_key = 'section_id' AND ms.meta_value = $section_id");



                                            if (mysqli_num_rows($query) > 0) {
                                                while ($timetable = mysqli_fetch_object($query)) {

                                                    $post_id = $timetable->item_id;
                                        ?>
                                                    <td>
                                                        <div class="timetable-cell">
                                                            <a href="?action=edit&id=<?php echo $post_id; ?>" class="btn btn-xs btn-default timetable-cell-edit"><i class="fa fa-pencil-alt"></i></a>
                                                            <p>
                                                                <b>Teacher: </b>
                                                                <?php
                                                                $teacher_id = get_metadata($post_id, 'teacher_id')[0]->meta_value;
                                                                echo get_user_data($teacher_id)['name'];
                                                                ?>
                                                                <br>
                                                                <b>Subject: </b>
                                                                <?php
                                                                $subject_id = get_metadata($post_id, 'subject_id',)[0]->meta_value;
                                                                echo get_post(array('id' => $subject_id))->title;
                                                                ?>
                                                                <br>
                                                            </p>
                                                        </div>
                                                    </td>
                                                <?php }
                                            } else { ?>
                                                <td>
                                                <div class="timetable-cell">
                                                    <a href="?action=add" class="btn btn-xs btn-default timetable-cell-edit"><i class="fa fa-plus"></i></a>
                                                    <p>Unscheduled</p>
                                                </div>
                                                </td>

                                        <?php }
                                        } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<!-- Subject -->
<?php include('footer.php') ?>

<style>
    .timetable-cell{
        position: relative;
    }
    td{
        transition: all .3s ease-in-out;
    }
    td:hover{
        background: #00000022;
    }
    td:hover .timetable-cell-edit{
        opacity: 1;
        z-index: 2;
    }
    .timetable-cell-edit{
        position: absolute;
        top: 0;
        right: 0;
        opacity: 0;
        transition: opacity .3s ease-in-out;
    }
    p:last-child{
        margin-bottom: 0;
    }
</style>