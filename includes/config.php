<?php





  $db_conn = mysqli_connect('localhost', 'root', 'SPZ<d£58L7M3','sms_project');

  if (!$db_conn) {
    echo 'Connection Failed';
    exit;
  }
  session_start();
  $query = mysqli_query($db_conn , "SELECT * FROM `settings` WHERE setting_key = 'site_url'");
  if(mysqli_num_rows($query) < 1){

    if(isset($_POST['submit'])){
      $site_url = !empty($_POST['site_url'])?$_POST['site_url']:'http://localhost/sms-project/';
      mysqli_query($db_conn,"INSERT INTO `settings` (setting_key, setting_value) VALUES ('site_url', '$site_url') ");
    }

    ?>
    <form action="" method="post">
      
      <input type="url" placeholder="Enter Your Site URL eg. 'http://localhost/sms-project/'" name="site_url">
      <input type="submit" value="Save" name="submit">
    </form>

    <style>
      form{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 400px;
        background-color: #fff;
        box-shadow: 0 0 10px 5px #ccc;
        padding: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 10px;
        transform: translate(-50%,-50%);
      }

      input[type="url"]{
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
      }

      input[type="submit"]{
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border:1px solid #007bff;
        border-radius: 5px;
        cursor: pointer;
        transition: all .3s ease-in-out;
      }
      input[type="submit"]:hover{
        background-color: #0057b5;
      }
    </style>
    <?php
    die;
  }
  date_default_timezone_set('Asia/Kolkata');
  include('functions.php');

  $site_url = site_url();

?>
