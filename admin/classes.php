<?php include('../includes/config.php') ?>


<?php
if (isset($_POST['submit'])) {
  $title = $_POST['title'];

  $sections = isset($_POST['sections']) ? $_POST['sections'] : [];
  // $added_date = date('Y-m-d');
  $classmeta = [
    'sections' => serialize($sections)
  ];

  if (empty($_POST['post_id'])) {
    $query = mysqli_query($db_conn, "INSERT INTO `posts`(`author`, `title`, `description`, `type`, `status`,`parent`) VALUES ('1','$title','description','class','publish',0)") or die('DB error');

    if ($query) {
      $post_id = mysqli_insert_id($db_conn);
    }

    foreach ($classmeta as $key => $value) {
      mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`,`meta_key`,`meta_value`) VALUES ('$post_id','$key','$value')") or die(mysqli_error($db_conn));
    }
    $_SESSION['success_msg'] = 'Class has been succefuly added';
  } else {
    $item_id = $_POST['post_id'];
    mysqli_query($db_conn, "UPDATE `posts` SET `title` = '$title' WHERE id = '$item_id' ") or die('DB error');

    foreach ($classmeta as $key => $value) {
      mysqli_query($db_conn, "UPDATE `metadata` SET `meta_value`='$value' WHERE `item_id`='$item_id' AND `meta_key`='$key'") or die(mysqli_error($db_conn));
    }
    $_SESSION['success_msg'] = 'Class has been succefuly updated';
  }


  header('Location: classes.php');
  exit();
}

?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Manage Classes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="">Admin</a></li>
          <li class="breadcrumb-item active">Classes</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <?php
    if (isset($_REQUEST['action'])) {
      $post_id = '';
      $class_meta = [
        'sections' => serialize([])
      ];
      $class_sections = '';
      if (!empty($_GET['id'])) {
        $post_id = $_GET['id'];

        $class = get_post(['id' => $post_id]);
        $class_sections = get_metadata($post_id, 'sections') ? get_metadata($post_id, 'sections')[0]->meta_value : '{}';
        
      }
      $class_name = isset($class->title) ? $class->title : '';
    ?>
      <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">
            Add New class</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" placeholder="Title" required class="form-control" value="<?php echo $class_name; ?>">
            </div>
            <div class="form-group">
              <label for="title">Sections</label><br>
              <?php
              $args = array(
                'type' => 'section',
                'status' => 'publish',
              );
              $sections = get_posts($args);
              foreach ($sections as $key => $value) {
                $selected ='';
                if($class_sections){
                  $selected = in_array($value->id, unserialize($class_sections)) ? 'checked' : '';
                }
              ?>
                <label for="<?php echo $key ?>" class="mr-3">
                  <input type="checkbox" name="sections[]" class="mr-1" id="<?php echo $key ?>" <?php echo $selected ?> value="<?= $value->id ?>" placeholder="section">
                  <?php echo $value->title ?>
                </label>
              <?php
              } ?>
            </div>
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <button name="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    <?php } else { ?>
      <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">Classes</h3>
          <div class="card-tools">
            <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive bg-white">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>section</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count = 1;
                $args = array(
                  'type' => 'class',
                  'status' => 'publish',
                );
                $classes = get_posts($args);
                foreach ($classes as $class) { ?>
                  <tr>
                    <td><?= $count++ ?></td>
                    <td><?= $class->title ?></td>
                    <td>
                      <?php
                      $sections = get_metadata($class->id, 'sections');
                      
                      if ($sections) {
                        $sections = current($sections)->meta_value;
                        foreach (unserialize($sections) as $value) {
                          $section = get_post(['id' => $value]);
                          echo '<span class="btn btn-sm btn-default">' . $section->title . '</span> ';
                        }
                      }
                      ?>
                    </td>
                    <td><?= $class->publish_date ?></td>
                    <td>
                      <a href="classes.php?action=edit&id=<?php echo $class->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    <?php } ?>
  </div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>