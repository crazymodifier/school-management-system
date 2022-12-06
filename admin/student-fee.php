<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Student Fee Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Student Fee Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php if(isset($_GET['action']) && $_GET['action'] == 'view') {
          $std_id= isset($_GET['std_id'])?$_GET['std_id']:'';
          $usermeta = get_user_metadata($std_id);
          ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Student Detail</h3>
          </div>
          <div class="card-body"> 
            <strong>Name: </strong> <?php echo get_users(array('id'=>$std_id))[0]->name ?> <br>
            <strong>Class: </strong> <?php echo $usermeta['class'] ?>
            
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tution Fee</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead> 
                <tr>
                  <th>S.No</th>
                  <th>Month</th>
                  <th>Fee Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $months = array('january', 'fabruary','march','april','may','june','july','august','september','october','november','december');
                foreach ($months as $key => $value) {
                  $highlight = ''; 
                  if(date('F') == ucwords($value))
                  {
                    $highlight = 'class="bg-success"';
                  }
                  ?>
                  <tr>
                    <td><?php echo ++$key?></td>
                    <td <?php echo $highlight?>><?php echo ucwords($value)?></td>
                    <td></td>
                    <td>
                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-primary"><i class="fa fa-eye fa-fw"></i> View</a>
                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-warning"><i class="fa fa-money-check-alt fa-fw"></i> Pay Now</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-dark"><i class="fa fa-envelope fa-fw"></i> Send Message</a>

                      <a href="?action=pay&month=<?php echo $value?>&std_id=<?php echo $std_id?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i>Delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php } else { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.no.</th>
                    <th>Student Name</th>
                    <th>Last Payment</th>
                    <th>Due Payment</th>
                    <th>Fee Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $students = get_users(array('type'=>'student'));
                foreach ($students as $key => $student) {?>
                <tr>
                    <td><?php echo ++$key?></td>
                    <td><?php echo $student->name?></td>
                    <td>4/12</td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="?action=view&std_id=<?php echo $student->id?>" class="btn btn-sm btn-info"><i class="fa fa-eye fa-fw"></i> View</a>
                      <!-- <a href="" class="btn btn-xs btn-dark"><i class="fa fa-pencil-alt fa-fw"></i></a> -->
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>