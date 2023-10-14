<?php include('../includes/config.php') ?>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $file = $_FILES["attachment"]["name"];
    $today = date('Y-m-d');

    $target_dir = "../dist/uploads/";
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    // $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["attachment"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    // && $imageFileType != "gif" ) {
    //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //   $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {
            // mysqli_query($db_conn, "INSERT INTO courses (`name`, `category`, `duration`,`image`, `date`) VALUES ('$name', '$category', '$duration', '$image', '$today')") or die(mysqli_error($db_conn));


            $query = mysqli_query($db_conn, "INSERT INTO `posts` (`title`, `description`, `type`, `status`, `parent`, `author`) VALUES ('$title', '$description', 'study-material', 'publish', 0, 1)");

            if ($query) {
                $item_id = mysqli_insert_id($db_conn);
            }
        
            $metadata = array(
                'class' => $class,
                'subject' => $subject,
                'file_attachment' => $file
            );
        
            foreach ($metadata as $key => $value) {
                mysqli_query($db_conn, "INSERT INTO `metadata` (`item_id`, `meta_key`, `meta_value`) VALUES ('$item_id', '$key', '$value')");
            }
            $_SESSION['success_msg'] = 'Course has been uploaded successfuly';
            header('Location: study-materials.php');
            exit;
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
                <h1 class="m-0 text-dark">Study Materials</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
                    <li class="breadcrumb-item active">Study Materials</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        


        <?php if(isset($_GET['action']) && $_GET['action'] == 'add-new') {
             $classes = get_posts([
                'type' => 'class',
                'status' => 'publish'
            ]);
    
            $subjects = get_posts([
                'type' => 'subject',
                'status' => 'publish'
            ]);
        ?>
        <!-- Info boxes -->
        <div class="card">
            <div class="card-header py-2">
                <h3 class="card-title">
                    Add New Study-Material
                </h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" placeholder="enter the title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">Description</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Select Class</label>
                        <select required name="class" class="form-control" id="class">
                            <option value="">Select Class</option>
                            <?php

                            foreach ($classes as $key => $class) {
                                echo '<option value="' . $class->id . '">' . $class->title . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Select Your Subject</label>
                        <select required name="subject" class="form-control" id="subject">
                            <option value="">Select Your Subject</option>
                            <?php

                            foreach ($subjects as $key => $subject) {
                                echo '<option value="' . $subject->id . '">' . $subject->title . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" name="attachment" id="attachment" required>
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
        <div class="card">
          <div class="card-header py-2">
            <h3 class="card-title">
              Study Materials
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
                    <th>Title</th>
                    <th>Attachment</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                      <?php
                      $count = 1;
                      $query = mysqli_query($db_conn, "SELECT * FROM `posts` WHERE `type` = 'study-material' AND author = 1");
                      while ($att = mysqli_fetch_object($query)) {
                        
                          $class_id = get_metadata($att->id, 'class')[0]->meta_value;

                          $class = get_post(['id' => $class_id]);

                          $subject_id = get_metadata($att->id, 'subject')[0]->meta_value;

                          $subject = get_post(['id' => $subject_id]);


                          $file_attachment = get_metadata($att->id, 'file_attachment')[0]->meta_value;

                        //   $file_attachment = get_post(['id' => $file_attachment]);
                        //   echo '<pre>';
                        //   print_r($class);
                        //   echo '</pre>';
                          ?>
                      <tr>
                          <td><?=$count++?></td>
                          <td><?=$att->title?></td>
                          <td><a href="<?="../dist/uploads/".$file_attachment; ?>">Download File</a></td>
                          <td><?=$class->title?></td>
                          <td><?=$subject->title?></td>
                          <td><?=$att->publish_date?></td>
                          
                      </tr>

                      <?php } ?>

                    </toby>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <?php } ?>
    </div>
</section>


<?php include('footer.php') ?>