<?php include('../includes/config.php') ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<?php 
  if(isset($_POST['submit']))
  {
   $title = $_POST['title'];
  
   $sections = implode(',',$_POST['section']); 
   
   $added_date = date('Y-m-d');
   mysqli_query($db_conn, "INSERT INTO classes(title,section,added_date) VALUE ('$title','$sections','$added_date')") or die('DB error');
  }

  ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Classes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Admin</a></li>
              <li class="breadcrumb-item active">Classes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <?php
        if(isset($_REQUEST['action'])){ ?>
      <div class="card">
          <div class="card-header py-2">
              <h3 class="card-title">
                 Add New class</h3>
        </div>
                 <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" placeholder="Title" required class="form-control">
                </div>
                <div class="form-group">
                <label for="title">Sections</label>
                <?php 
                $query = mysqli_query($db_conn,'SELECT * FROM sections');
                $count=1;
                while($sections = mysqli_fetch_object($query)) { ?>
                <!-- <div>
                  <label for="<?=$count++?>">
                      <input type="checkbox"  name="section[]" id="<?=$count++?>" value="<?=$sections->id?>" placeholder="section">
                      <?=$sections->title?> 
                  </label>
                </div> -->

                <div>
                  <label for="<?php echo $count++?>">
                      <input type="checkbox"  name="section[]" id="<?php echo $count++?>" value="<?=$sections->id?>" placeholder="section">
                      <?php echo $sections->title?> 
                  </label>
                </div>
                <?php
                $count++;
                }?>
                </div>
                <button name="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
          </div>
          <?php }else{?>
          <div class="card">
          <div class="card-header py-2">
          <h3 class="card-title">Classes</h3>
          <div class="card-tools">
          <a href="?action=add-new" class="btn btn-success btn-xs"><i class="fa fa-plus mr-2"></i>Add New</a>
          </div>
          <div class ="card-body">
          <div class="table-responsive bg-white">
          <table class="table table-bordered">
          <thead>
          <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>section</th>
          <th>Date</th>
          <th>Action</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          $count = 1;
          $args = array(
            'type' => 'class',
            'status' => 'publish',
          );
          $classes = get_posts($args);
          foreach($classes as $class){?>
              <tr>
              <td><?=$count++?></td>
              <td><?=$class->title?></td>
              <td>
              <?php 
              $class_meta = get_metadata($class->id,'section');
              foreach ($class_meta as $meta){
                $section = get_post(array('id'=>$meta->meta_value));
                echo $section->title;
              }?>
              </td>
              <td><?=$class->publish_date?></td>
              <td></td>
              </tr>
           <?php } ?>
          </tbody>
          </table>
          </div>
          
          </div>
          </div>
      </div>
      <?php }?>
      </div>
    </section>
    <!-- /.content -->
<?php include('footer.php'); ?>