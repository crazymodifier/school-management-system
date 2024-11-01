<?php
  
  $site_url = site_url();
  if(isset($_SESSION['login']) && $_SESSION['login'] == TRUE)
  {
    if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'admin')
    {
      $user_type = $_SESSION['user_type'];
      header('Location: '.$site_url.$user_type.'/dashboard.php');
      exit();
    }
  }
  else 
  {
    header('Location:'.$site_url.'login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard </title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <link rel="stylesheet" href="<?php echo $site_url;?>plugins/calendar/zabuto_calendar.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $site_url;?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?php echo $site_url;?>plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">