<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Time Table</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                <form action="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="class">Select Class</label>
                                <select require name="class" id="class" class="form-control">
                                    <option value="">-Select Class-</option>
                                    <?php
                                    $args = array(
                                      'type' => 'class',
                                      'status' => 'publish',
                                    );
                                    $classes = get_posts($args); 
                                    foreach ($classes as $key => $class) { ?>
                                    <option value="<?php echo $class->id ?>"><?php echo $class->title ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" id="section-container">
                                <label for="section">Select Section</label>
                                <select require name="section" id="section" class="form-control">
                                    <option value="">-Select Section-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


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
                        <tr>
                            <td>7:00 AM - 7:45 AM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>7:45 AM - 8:30 AM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>8:30 AM - 9:15 AM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>9:15 AM - 10:00 AM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>10:00 AM - 10:30 AM</td>
                            <td colspan="7">
                                Lunch Break
                            </td>
                        </tr>
                        <tr>
                            <td>10:30 AM - 11:15 AM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>11:15 AM - 12:00 PM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>12:00 PM - 12:45 PM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>12:45 PM - 01:30 PM</td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <b>Teacher: </b> Teacher Name <br>
                                    <b>Class: </b> Class 1 <br>
                                    <b>Section: </b> B<br>
                                    <b>Subject: </b> Mathematics <br>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>