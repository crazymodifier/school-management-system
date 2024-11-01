<?php include('../includes/config.php') ?>
<?php include('header.php') ?>
<?php include('sidebar.php') ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Examinations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Examinations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Exam</h3>
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="form-group">
                    <label for="title">Name of Examination</label>
                    <input type="text" name="title" id="title" placeholder="Enter Examination title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="title">Name of Examination</label>
                    <input type="text" name="title" id="title" placeholder="Enter Examination title" class="form-control">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Examinations</h3>
              </div>
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
<?php include('footer.php') ?>