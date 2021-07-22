<?php

  $db_conn = mysqli_connect('localhost', 'root', '','sms_project');

  if (!$db_conn) {
    echo 'Connection Failed';
    exit;
  }
  session_start();
  // if(empty($_SESSION) || !isset($_SESSION['login']))
  // {
  //   session_start();
  // }

  include('functions.php');
?>
