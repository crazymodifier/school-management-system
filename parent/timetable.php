<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Time Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Time Table</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Timing</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <th>Sunday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $args = array(
                            'type' => 'period',
                            'status' => 'publish',
                        );
                        $periods = get_posts($args);

                        foreach($periods as $period){ 
                            $from = get_metadata($period->id, 'from')[0]->meta_value;

                            $to = get_metadata($period->id, 'to')[0]->meta_value;
                            ?>
                        <tr>
                            <td><?php echo date('h:i A',strtotime($from)) ?> - <?php echo date('h:i A',strtotime($to)) ?></td>
                            <?php 

                            $days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
                            foreach($days as $day){ 
                                $query = mysqli_query($db_conn, "SELECT * FROM posts as p INNER JOIN metadata as mc ON (mc.item_id = p.id) INNER JOIN metadata as md ON (md.item_id = p.id) INNER JOIN metadata as mp ON (mp.item_id = p.id) WHERE p.type = 'timetable' AND p.status = 'publish' AND md.meta_key = 'day_name' AND md.meta_value = '$day' AND mp.meta_key = 'period_id' AND mp.meta_value = $period->id AND mc.meta_key = 'class_id' AND mc.meta_value = 1");

                                if(mysqli_num_rows($query) > 0)
                                {
                                    while($timetable = mysqli_fetch_object($query)) {
                                        
                                        
                                        ?>
                                        <td>
                                            <p>
                                                <b>Teacher: </b> 
                                                <?php 
                                                $teacher_id = get_metadata($timetable->item_id,'teacher_id',)[0]->meta_value;
                                                echo get_user_data($teacher_id)[0]->name;
                                                ?> 
                                                
                                                <br>
                                                <b>Subject: </b> 
                                                <?php 
                                                $subject_id = get_metadata($timetable->item_id,'subject_id',)[0]->meta_value;
                                                echo get_post(array('id'=>$subject_id))->title;
                                                ?>
                                            </p>
                                        </td>
                                    <?php } 
                                }else { ?>
                                    <td>
                                        Unscheduled 
                                    </td>     
                                
                                <?php }  
                            }?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>