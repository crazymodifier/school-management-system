<?php include('../includes/config.php') ?>
<?php
$error = '';
if (isset($_POST['submit'])) {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");
  if (mysqli_num_rows($check_query) > 0) {
    $error = 'Email already exists';
  } else {
    mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$password','$type')") or die(mysqli_error($db_conn));
    $_SESSION['success_msg'] = 'User has been succefuly registered';
    header('location: user-account.php?user=' . $type);
    exit;
  }
}

if(!empty($_GET['action']) && 'trash' == $_GET['action']){
  $std_id = isset($_GET['id'])? $_GET['id'] : header('location: user-account.php?user=student');  
  mysqli_query($db_conn,"DELETE FROM `usermeta` WHERE `user_id` = $std_id") or die('Something went Wrong while deleting student');
  mysqli_query($db_conn,"DELETE FROM `accounts` WHERE `id` = $std_id") or die('Something went Wrong while deleting student');

  $_SESSION['success_msg'] = 'User has been succefuly removed';
  header('location: user-account.php?user='.$_GET['user']);exit;
}
?>


<?php include('header.php') ?>
<?php include('sidebar.php') ?>
<style>
  /* span#loader {
    position: absolute;
    left: 50;
    width: 100%;
    height: 100%;
    background: #e2e2e2b5;
}

i.fas.fa-circle-notch.fa-spin {
    left: 50%;
    position: absolute;
    top: 50%;
    font-size: 10rem;
    transform: translate(-50%,-50%);
    transform-origin: center;
} */
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <div class="d-flex">
          <h1 class="m-0 text-dark">Manage Accounts</h1>
          <!-- <a href="user-account.php?user=<?php echo $_REQUEST['user'] ?>&action=add-new" class="btn btn-primary btn-sm">Add New</a> -->
        </div>

      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Accounts</a></li>
          <li class="breadcrumb-item active"><?php echo ucfirst($_REQUEST['user']) ?></li>
        </ol>
      </div><!-- /.col -->
      <?php
      // $_SESSION['success_msg'] = 'User has been succefuly registered';
      // print_r($_SESSION);
      if (isset($_SESSION['success_msg'])) { ?>
        <div class="col-12">
          <small class="text-success" style="font-size:16px"><?= $_SESSION['success_msg'] ?></small>
        </div>
      <?php
        unset($_SESSION['success_msg']);
      }
      ?>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <?php if(isset($_GET['user'])) include('users/'.$_GET['user'].'s.php'); ?>

  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
<script>
  jQuery(document).on('click', '.trash-user', function(e){
    
    if (confirm('Are you sure?') == false) {
      return false;
    }
  });
</script>
<?php include('footer.php') ?>