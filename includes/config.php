<?php

  $db_conn = mysqli_connect('localhost', 'root', 'SPZ<d£58L7M3','sms_project');

  if (!$db_conn) {
    echo 'Connection Failed';
    exit;
  }
  session_start();
  
  date_default_timezone_set('Asia/Kolkata');
  include('functions.php');

  $site_url = site_url();
  if($site_url == ''){
    include_once '../reset.php';
    die;
  }
?>
