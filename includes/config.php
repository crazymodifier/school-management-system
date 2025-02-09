<?php

  $db_conn = mysqli_connect('localhost', 'root', 'root','sms_project');

  if (!$db_conn) {
    echo 'Connection Failed';
    exit;
  }
  session_start();
  date_default_timezone_set('Asia/Kolkata');
  include('functions.php');

  $site_url = get_setting('site_url', true);

  if(empty($site_url)){

    if(!empty($_POST['site_url'])){


      $query = mysqli_query($db_conn, "INSERT INTO `settings` (setting_key, setting_value) VALUES ('site_url' , '{$_POST['site_url']}')") or die('Error while inserting');
      
      if($query){
        header('Location: /sms-project/index.php'); die;
      }
    }

    ?>
    <form action="" method="post">
      <div class="">
        <input type="url" class="" name="site_url" placeholder="Enter your site URL">

        <button>Submit</button>
      </div>
    </form>
    <?php 

    die;
  }
?>
