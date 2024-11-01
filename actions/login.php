<?php

  include('../includes/config.php');
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];
    
    $pass_md5 = md5($pass);

    // $query = mysqli_query($db_conn,"SELECT * FROM `accounts` WHERE `email` = '$email' AND `password` = '$pass_md5'");

    $query = mysqli_query($db_conn,"SELECT * FROM `accounts` as a JOIN `usermeta` as um ON um.user_id = a.id WHERE a.password='$pass_md5' AND ( a.email = '$email' OR (um.meta_key IN ('emp_id','enrollment_no') AND um.meta_value = '$email'))");

    // print_r("SELECT * FROM `accounts` as a JOIN `usermeta` as um ON um.user_id = a.id WHERE a.password='$pass_md5' AND ( a.email = '$email' OR (um.meta_key IN ('emp_id','enrollment_no') AND um.meta_value = '$email'))");
    if(mysqli_num_rows($query) > 0)
    {
      $user = mysqli_fetch_object($query);
      $_SESSION['login'] = true;
      $_SESSION['session_id'] = uniqid();
      
      $user_type = $user->type;
      $_SESSION['user_type'] = $user_type;
      $_SESSION['user_id'] = $user->user_id;
      header('Location: ../'.$user_type.'/dashboard.php');
      exit();
    }
    else if ($email == 'admin@example.com' && $pass == 'admin@sms') {
      
      $_SESSION['login'] = true;
      header('Location: ../admin/dashboard.php');
    }
    else {
      echo 'Invailid Credentials';
    }
  }