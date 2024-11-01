<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="user-account.php">
      <div class="input-group input-group-sm">
        <input type="hidden" name="user" value="<?php echo isset($_GET['user'])?$_GET['user']:'student';?>">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" name="s" aria-label="Search" value="<?php echo isset($_GET['s'])?$_GET['s']:'';?>">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item mr-3">
        <span class="nav-">
          <small><b>Current Session</b><br> <?php echo get_setting('current_session');?></small>
        </span>
      </li>
      <li class="nav-item dropdown">
        
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=$site_url?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=$site_url?>dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=$site_url?>dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="<?php echo $site_url;?>logout.php" class="nav-link" title="Logout">
        Logout <i class="fa fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=$site_url?>/admin/dashboard.php" class="brand-link">
      <img src="<?php echo $site_url;?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMS Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="<?=$site_url?>admin/dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Accounts -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/user-account.php?user=teacher" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teachers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/user-account.php?user=student" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/user-account.php?user=parent" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Parents</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Classes -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard"></i>
              <p>
                Manage Classes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?=$site_url?>admin/sections.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/classes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/courses.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Courses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/subjects.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/lessons.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lessons</p>
                </a>
              </li>
            </ul>
          </li>
          
          <!-- Class Routine -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Manage Class Routines
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/periods.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/timetable.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Time Table</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Examination -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Manage Examinations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/exam-form.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Examinations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/admin-card.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin card</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/paper-schedule.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paper Schedule</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/results.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Results</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Attendance -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Manage Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>       
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/attendance.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/leave.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave</p>
                </a>
              </li>
            </ul>       
          </li>

          <!-- Manage Accounts -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Manage Accountings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?=$site_url?>admin/student-fee.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Fee Details</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Study Materials -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paste"></i>
              <p>
                Study Materials
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>  
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/study-materials.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Study Materials</p>
                </a>
              </li>
            </ul>           
          </li>

          <!-- Event -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-check"></i>
              <p>
                Manage Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>     
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/campus-functions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Campus Functions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=$site_url?>admin/webinar-seminar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Webinar/Seminar</p>
                </a>
              </li>
            </ul>        
          </li>
          <!-- Communication -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Communications
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/parent-meeting.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Parent's Meetings</p>
                </a>
              </li>
            </ul>          
          </li>

          <!-- Acadmy Settings -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Acadmy Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>    
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=$site_url?>admin/acadamy-settings/basic-information.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basic Informations</p>
                </a>
              </li>
            </ul>          
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">