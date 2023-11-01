<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Manage Student Attendance</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ol>
            </div><!-- /.col -->


        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?php
$current_month = strtolower(date('F'));
$current_year = date('Y');

?>
<!-- Main content -->
<section class="content">
        <div class="container-fluid">

            <form action="" method="get">
                <div class="row">
                    <div class="col-auto">
                        <div class="form-group">
                            <select name="std_id" id="std_id" class="form-control">
                                <option value="">Select Student</option>
                                <?php

                                $stds = get_users([
                                    'type' => 'student'
                                ]);

                                foreach ($stds as $key => $std) {
                                    // $selected = ($current_month == $value) ? 'selected' :'';
                                    $selected = (!empty($_GET['std_id'])) ? ( ($_GET['std_id'] == $std->id) ? 'selected' : '') : '';
                                    echo '<option value="'.$std->id.'" '.$selected.' >'.$std->name.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <select name="month" id="month" class="form-control">
                                <option value="">Select Month</option>
                                <?php
                                $months = array('january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
                                
                                foreach($months as $value){
                                    // $selected = ;

                                    $selected = (!empty($_GET['month'])) ? ( ($_GET['month'] == $value) ? 'selected' : '') : (($current_month == $value) ? 'selected' :'');
                                    echo '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <select name="year" id="year" class="form-control">
                                <option value="">Select Year</option>
                                <?php 
                                $registered_year = 2023;

                                for ($i=$registered_year; $i <= $current_year; $i++) { 
                                    $selected = (!empty($_GET['year'])) ? ( ($_GET['year'] == $i) ? 'selected' : '') : (($current_year == $i) ? 'selected' :'');
                                    echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <input type="submit" name="filter" class="btn btn-primary" value="Show">
                        </div>
                    </div>
                </div>
            </form>

            <?php if(isset($_GET['filter']) && !empty($_GET['month']) && !empty($_GET['year']) && !empty($_GET['std_id'])) {
                $month = $_GET['month'];
                $year = $_GET['year'];
                $std_id = $_GET['std_id'];
                ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Attendance</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>Status</td>
                                <td>Singin Time</td>
                                <td>Singout Time</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            
                            $sql = "SELECT * FROM `attendance` WHERE `attendance_month` = '$month' AND year(current_session) = $year AND std_id = $std_id";

                            $query = mysqli_query($db_conn, $sql);

                            $row = mysqli_fetch_object($query);

                            foreach(unserialize($row->attendance_value) as $date => $value){ ?>
                            <tr>
                                 <td><?php echo $date;?></td>
                                 <td><?php echo ($value['signin_at'])? 'Present' : 'Absent';?></td>
                                 <td><?php echo ($value['signin_at'])? date('d-m-yyy h:i:s', $value['signin_at']) : '';?></td>
                                 <td><?php echo ($value['signout_at'])? date('d-m-yyy h:i:s', $value['signout_at']) : '';?></td>
                             </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php } ?>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

<?php include('footer.php') ?>
