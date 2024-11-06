<?php
include_once 'includes/config.php';

$sql = 'CREATE TABLE IF NOT EXISTS settings (
        id INT AUTO_INCREMENT PRIMARY KEY,
        setting_key VARCHAR(255) DEFAULT NULL,
        setting_value VARCHAR(255) DEFAULT NULL
    )';

$result = mysqli_query($db_conn, $sql);


if (isset($_POST['submit'])) {

    $site_url = !empty($_POST['site_url']) ? $_POST['site_url'] : 'http://localhost/sms-project/';
    if(site_url()){
        mysqli_query($db_conn, "UPDATE `settings` SET `setting_value` = '$site_url' WHERE `setting_key` = 'site_url' ");
    }
    else{
        mysqli_query($db_conn, "INSERT INTO `settings` (setting_key, setting_value) VALUES ('site_url', '$site_url') ");
    }

    header('Location: '.$site_url);
    exit();
}

?>
<form action="" method="post">

    <input type="url" placeholder="Enter Your Site URL eg. 'http://localhost/sms-project/' (use port too if it not 80)" name="site_url">
    <input type="submit" value="Save" name="submit">
</form>

<style>
    form {
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
        transform: translate(-50%, -50%);
    }

    input[type="url"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 5px;
        cursor: pointer;
        transition: all .3s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #0057b5;
    }
</style>
