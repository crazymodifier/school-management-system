<?php include('../includes/config.php') ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php
if (isset($_POST['submit'])) {
  $title = $_POST['title'];

  $sections = $_POST['section'];
  // $added_date = date('Y-m-d');
  $query = mysqli_query($db_conn, "INSERT INTO `posts`(`author`, `title`, `description`, `type`, `status`,`parent`) VALUES ('1','$title','description','class','publish',0)") or die('DB error');

  if($query)
  {
    $post_id = mysqli_insert_id($db_conn);
  }
  foreach ($sections as $key => $value) {
    mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`,`meta_key`,`meta_value`) VALUES ('$post_id','section','$value')") or die(mysqli_error($db_conn));
  }
}

?>
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
    if (isset($_REQUEST['action'])) { ?>
      <div class="card">
        <div class="card-header py-2">
          <h3 class="card-title">
            Add New class</h3>
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" placeholder="Title" required class="form-control">
            </div>
            <div class="form-group">
              <label for="title">Sections</label>
              <?php
              $args = array(
                'type' => 'section',
                'status' => 'publish',
              );
              $sections = get_posts($args);
              foreach($sections as $key => $section){ ?>
                <div>
                  <label for="<?php echo $key ?>">
                    <input type="checkbox" name="section[]" id="<?php echo $key ?>" value="<?= $section->id ?>" placeholder="section">
                    <?php echo $section->title ?>
                  </label>
                </div>
              <?php
              } ?>
            </div>
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
                    <td>Class <?= $class->title ?></td>
                    <td>
                      <?php
                      $class_meta = get_metadata($class->id, 'section');
                      foreach ($class_meta as $meta) {
                        $section = get_post(array('id' => $meta->meta_value));
                        echo $section->title;
                      } ?>
                    </td>
                    <td><?= $class->publish_date ?></td>
                    <td></td>
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