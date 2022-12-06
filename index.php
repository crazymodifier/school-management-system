  <?php include('includes/config.php') ?>
  <?php include('header.php') ?>

  <!--Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark default-color">
    <a class="navbar-brand" href="#"><b>SMS</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
      aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Events</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">Dropdown
          </a>
          <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        
        <li class="nav-item dropdown">
          <?php if (isset($_SESSION['login'])) { ?>
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user mr-2"></i>Account
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default"
            aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item" href="/sms/admin/dashboard.php">Dashboard</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          <?php } else { ?>
          <a href="login.php" class="nav-link"><i class="fa fa-user mr-2"></i>User login</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->

  <div class="py-5 shadow" style="background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
    <div class="container-fluid my-2">
      <div class="row">
        <div class="col-lg-6 my-auto">
          <h1 class="display-3 font-weight-bold">Addmission Open for 2021-2022</h1>
          <p class="py-lg-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro aperiam similique error, <br> iste molestiae dignissimos odit voluptat</p>
          <a href="" class="btn btn-lg btn-primary">Call to Action</a>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-8 mx-auto card shadow-lg">
            <div class="card-body py-5">
              <h3>Inquiry Form</h3>
              <form action="" method="post" class="">
                <!-- Material input -->
                <div class="md-form">
                  <input type="text" id="form1" class="form-control">
                  <label for="form1">Your Name</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <input type="email" id="email" class="form-control">
                  <label for="email">Your Email</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <input type="text" id="mobile" class="form-control">
                  <label for="mobile">Your Mobile</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                  <!-- <input type="text" id="class" class="form-control"> -->
                  <textarea name="" id="message" class="form-control md-textarea" rows="3"></textarea>
                  <label for="message">Your Query</label>
                </div>

                <button class="btn btn-primary btn-block">Submit Form</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- About us -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 py-5 ">
          <h2 class="font-weight-bold">About <br>  School Management System</h2>
          <div class="pr-5">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque quidem id ad dolores iusto nobis sunt, atque, eligendi nesciunt ipsa aliquam mollitia nemo magnam quae adipisci libero voluptatum omnis vel. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo dicta ipsum ea sint quisquam sit dignissimos numquam. Velit aliquid necessitatibus id adipisci officiis nobis voluptates maiores consectetur, sunt nisi? Commodi.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quos ab, recusandae repellendus cum quasi totam saepe sit earum tenetur modi vitae explicabo, neque, consequatur aut ipsam dolore magni laudantium?</p>
          </div>
          <a href="about-us.php" class="btn btn-secondary">Know More</a>
        </div>
        <div class="col-lg-6" style="background:url(./assets/images/still-life-851328_1280.jpg)">
        </div>
      </div>
    </div>
  </section>
  <style>
  .course-image
  {
    width:100%;
    height: 170px !important;
    object-fit: cover;
    object-position: center;
  }
  </style>   
  <!-- Our Courses -->
  <section class="py-5 bg-light">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Our Courses</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>

    <div class="container">
      <div class="row">
            
        <?php 
        $query = mysqli_query($db_conn,"SELECT * FROM courses ORDER BY id DESC LIMIT 0, 8");
        while($course = mysqli_fetch_object($query))
        {?>
        <div class="col-lg-3 mb-4">
          <div class="card">
            <div>
              <img src="./dist/uploads/<?php echo $course->image?>" alt="" class="img-fluid rounded-top course-image">
            </div>
            <div class="card-body">
              <b><?php echo $course->name?></b>
              <p class="card-text">
                <b>Duration: </b> <?php echo $course->duration?> <br>
                <b>Price: </b> 4000/- Rs
              </p>
              <button class="btn btn-block btn-primary btn-sm">Enroll Now</button>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Teachers -->
  <section class="py-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Our Teachers</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>

    <div class="container">
      <div class="row">
        <?php for ($i = 0; $i < 6; $i++){ ?>
        <div class="col-lg-4 my-5">
          <div class="card">
            <div class="col-5 position-absolute" style="top:-50px">
              <img src="./assets/images/placeholder.jpg" alt="" class="mw-100 border rounded-circle">
            </div>
            <div class="card-body pt-5 mt-4">
              <h5 class="card-title mb-0">Teacher's Name</h5>
              <p><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i></p>
              <p class="card-text">
                <b>Courses: </b> 5 <br>
                <b>Ratings: </b> 
              </p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Acheivements -->
  <section class="py-5 text-white"  style="background:#3923a7">
    <div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 pr-5">
            <h2>Acheivements</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, commodi laboriosam. Ullam aliquam dicta officiis accusamus.</p>

            <img src="./assets/images/still-life-851328_1280.jpg" alt="" class="img-fluid rounded">
          </div>
          <div class="col-lg-6 my-auto">
            <div class="row">
              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 mb-4">
                <div class="border rounded">
                  <div class="card-body text-center">
                    <span><i class=" text-warning fas fa-graduation-cap fa-2x"></i></span>
                    <h2 class="my-2 font-weight-bold h1">334</h2>
                    <hr class="border-warning">
                    <h4>Graduates</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Testimonials -->
  <section class="py-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">What Pepole Says</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="border rounded position-relative">
            <div class="p-4 text-center">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
            </div>
            <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
          </div>
          <div class="text-center mt-n2">
            <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">
            <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>
            <p><i>Designation</i></p>
          </div>
        </div>
        <div class="col-6">
          <div class="border rounded position-relative">
            <div class="p-4 text-center">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
            </div>
            <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
          </div>
          <div class="text-center mt-n2">
            <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">
            <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>
            <p><i>Designation</i></p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer style="background:url(./assets/images/still-life-851328_1280.jpg) center/cover no-repeat">
    <div  class="py-5 text-white" style="background:#000000bb"> 
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <h5>Useful Links</h5>

              <ul class="fa-ul ml-4">
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Home</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>About Us</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Courses</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Terms & Conditions</a></li>
                <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Privacy Policy</a></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <h5>Social Presence</h5>

              <div>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
                </span>
                <span class="fa-stack">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
                </span>
              </div>
            </div>
            <div class="col-lg-3">
              <h5>Subscribe Now</h5>
              <form action="">
                <!-- Material input -->
                <div class="form-group">
                  <input type="email" id="email-s" class="form-control" placeholder="Your Email">
                </div>
                <button class="btn btn-secondary py-2 btn-block">Submit</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </footer>

  <section class="py-2 bg-dark text-light">
    <div class="container-fluid">
      Copyright 2020-2020 All Rights Reseved. <a href="#" class="text-light">School Management System</a>
    </div>
  </section>
  
  <?php include('footer.php') ?>