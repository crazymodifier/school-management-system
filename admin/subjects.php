<?php include('../includes/config.php') ?>
<?php
   

  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $image = $_FILES["thumbnail"]["name"];
    $today = date('Y-m-d');

    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["thumbnail"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
        mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));
        $_SESSION['success_msg'] = 'Course has been uploaded successfuly';
        header('Location: courses.php'); exit;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    // ob_start();
    
    // ob_end_flush();
    
  }
  
?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Subjects </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Subjects</li>
            </ol>
          </div><!-- /.col -->
          <?php
           
            if(isset($_SESSION['success_msg']))
            {?>
              <div class="col-12">
                <small class="text-success" style="font-size:16px"><?=$_SESSION['success_msg']?></small>
              </div>
            <?php 
              unset($_SESSION['success_msg']);
            }
          ?>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
        if (isset($_REQUEST['action'])) { ?>
        <!-- Info boxes -->
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Add New Course
            </h3>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Course Name</label>
                <input type="text" name="name" placeholder="Course Name" required class="form-control">
              </div>
              <div class="form-group">
                <label for="category">Course Category</label>
                <select name="category" id="category" class="form-control">
                  <option value="">Select Category</option>
                  <option value="web-design-and-development">Web Design & Development</option>
                  <option value="app-developement">App Development</option>
                </select>
              </div>
              <div class="form-group">
                <label for="duration">Course Duration</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Course Duration" required>
              </div>
              <div class="form-group">
                <input type="file" name="thumbnail" id="thumbnail" required>
              </div>
              <button name="submit" class="btn btn-success">
                Submit
              </button>
            </form>
          </div>
        </div>
        <!-- /.row -->
        <?php }else{?>
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                            Add New Subject
                        </h3>
                    </div>
                    <div class="card-body" >
                        <form action="" method="post">
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

                            <div class="form-group" id="section-container" style="display:none">
                                <label for="section">Select Section</label>
                                <select require name="section" id="section" class="form-control">
                                    <option value="">-Select Section-</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject Name</label>
                                <input require type="text" name="subject" id="subject" placeholder="Subject Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header py-2">
                        <h3 class="card-title">
                        Subjects
                        </h3>
                        <div class="card-tools">
                            <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    $args = array(
                                      'type' => 'subject',
                                      'status' => 'publish',
                                    );
                                    $subjects = get_posts($args);
                                    foreach($subjects as $subject){?>
                                    <tr>
                                        <td><?=$count++?></td>
                                        <td><?=$subject->title?></td>
                                        <td><?=$subject->publish_date?></td>
                                    </tr>

                                    <?php } ?>

                                </toby>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <?php } ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>