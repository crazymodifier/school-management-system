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
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active">Attendance</li>
                </ol>
            </div><!-- /.col -->


        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
        <div class="container-fluid">

            <?php
            $usermeta = get_user_metadata($std_id);
            $class = get_post(['id' => $usermeta['class']]);
            ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Student Detail</h3>
                </div>
                <div class="card-body">
                    <strong>Name: </strong> <?php echo get_users(array('id' => $std_id))[0]->name ?> <br>
                    <strong>Class: </strong> <?php echo $class->title ?>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <?php
    $query = mysqli_query($db_conn,"SELECT * FROM `attendance` WHERE attendance_month = 'november' AND std_id = '{$std_id}' AND YEAR(current_session) = 2023");
    $data = mysqli_fetch_array($query);
    
    $data = unserialize($data['attendance_value']);
    
    $attdnc = [];
    
    foreach ($data as $key => $value) {
        
        if($value['signin_at']){
            $date = date('Y-m-d', strtotime(ucfirst('november').' '.$value['date'].', 2023'));
    
            $attdnc[] = [
                'date' => $date,
                'markup' => "[day]<span class=\"badge badge-sm rounded-pill px-2 bg-success\" style=\"font-size:12px\">P</span>"
            ];
        }
    
    }
    ?>
    <script>
    jQuery(document).ready(function(){
        attdnc = <?php echo json_encode($attdnc);?>;
        jQuery(".calendar").zabuto_calendar(
            {
                classname: 'table table-bordered lightgrey-weekends',
                navigation_prev: false,
                navigation_next: false,
                year: 2023,
                month: 11,
                events: attdnc
            }
        );
    });
</script>
<?php include('footer.php') ?>
