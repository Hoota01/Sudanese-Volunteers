<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sudanees Voluntrees</title>
  <link rel="icon" href="img/icon.png">
  <!-- font-awesome/6.7.2-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/Style.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<div class="wrapper">
  <header class="main-header">
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- logo for regular state and mobile devices -->
      <!--<span class="logo-lg"><b>Sudanees</b> Volantrees</span>-->
      <img src="img/icon.png" class="img-responsive"> 
    </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a class="" href="voluntree_Opportunities.php">Volunteer opportunity</a>
          </li>
          <li>
            <a href="about.php">About Us</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
          <a href="sign-up.php" >Registeration</a>
            
          </li>
          <li>
          <a href="login.php" class="active">Login</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="organaization/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>
<!-- start carousel-->
    <section>
    <div class="contaner">
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item active" data-bs-interval="1000">
        <img src="img/1s.jpg" class="d-block w-100 " alt="...">
        <div class="carousel-caption d-none d-md-block">
        <a href="voluntree_Opportunities.php" class ="btn">Volunteer Now</a>
        <h2>Volunteering is the real giving</h2>
            <p>When you contribute to serving others, you become part of the change you want to see in the world.</p>
        </div>
        </div>
        <div class="item" data-bs-interval="2000">
        <img src="img/2s.jpg" class="d-block w-100 " alt="...">
        <div class="carousel-caption d-none d-md-block">
        <a href="voluntree_Opportunities.php" class ="btn">Volunteer Now</a>
        <h2>Join the Million Volunteer Journey</h2>
            <p>Every small act of giving can make a big difference. Hurry up and join the caravan of goodness!</p>
        </div>
        </div>
        <div class="item">
        <img src="img/3s.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <a href="voluntree_Opportunities.php" class ="btn">Volunteer Now</a>
            <h2>Take the initiative to help those in need.</h2>
            <p>You will never learn more about humanity than when you help. Volunteering is a bridge between us and those in need.</p>
            </div>
            </div>
            <div class="item">
        <img src="img/4s.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <a href="voluntree_Opportunities.php" class ="btn">Volunteer Now</a>
            <h2>Volunteering is the key to real change.</h2>
            <p>Strong communities can only be built by all of us working together. Volunteering is the key to real change.</p>
            </div>
            </div>
    </div>
    <a href="#carouselExampleInterval" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span></a>

    <a href="#carouselExampleInterval" class="right carousel-control"  data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span> </a>
</div>
</div>
</section>
<!-- End carousel-->


    <!-- start Platform section-->
    <section id="about" class="content-header">
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>Platform Goals</h1>                      
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <?php
                        $sql = "SELECT * FROM users WHERE active='1'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            $totalno = $result->num_rows;
                        } else {
                            $totalno = 0;
                        }
                        ?>
                <h3> <?php echo $totalno; ?> <span>Volunteer</span> </h3>
            <p>Volunteer work is a feature of vibrant societies, due to its role in activating the energies of society 
                and enriching the country with the achievements and efforts of its people.
                Through the Sudanese Volunteers Platform, you can volunteer in the place,
                time and field that suits your experience and skills.
                Be part  of the hands that contribute to the renaissance of our beloved country<p>
                </p>
                <p>
                Join the journey of A <span>Million</span>  volunteers.
                
                </p>
                
            </div>
            <div class="col-md-6 about-text margin-bottom-20">
            <img src="img/suda.png" class="img-responsive">
            </div>
            </div>
        </div>
        </section>
        <!-- End Platform section-->
   

<!-- start About section-->
    <section id="about" class="content-header">
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>About US</h1>                      
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <img src="img/icon.png" class="img-responsive">
            </div>
            <div class="col-md-6 about-text margin-bottom-20">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing <p>The online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
                </p>
                <p>
                This website is used to provide a platform for potential candidates to get their dream job and excel in yheir career.
                This site can be used as a paving path for both companies and job-seekers for a better life .
                
                </p>
            </div>
            </div>
        </div>
        </section>
<!-- End About section-->
     
        <!-- Start footer -->
    <div class="footer pt-5 text-center text-md-start">
        <div class="container ">
        <div class="row">
            <div class="col-md-6 col-lg-4">
            <div class="info mb-5">
                <img src="img/logo.png" alt="" class="md-4 ">
            <p class="mb-5">
            Sudanees Voluntrees
            </p>
            <div class="copyright">
            Created By <span>Sudanees</span>
                <div>&copy; 2024-2025 <span>Sudanees Voluntrees</span> All rights</div>
            </div>
            </div>
            </div>
            <div class="coln md-6 col-lg-2">
            <div class="links">
            <h5 class="text-light">Helpful Links</h5>
            <ul class="list-unstyled lh-lg">
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About Us</a></li>
              <li> <a href="voluntree_Opportunities.php">Volunteer opportunity</a> </li>
              <li><a href="login.php">Login</a> </li>
            </ul>
          </div>
        </div>
        <div class="coln md-6 col-lg-2">
          <div class="links">
            <h5 class="text-light">Contact Us</h5>
            <ul class="list-unstyled lh-lg">
              <li><i class="fa-brands fa-instagram"> </i> Instagram</li>
              <li><i class="fa-brands fa-facebook"> </i>  Facebook</li>
              <li><i class="fa-brands fa-x-twitter"> </i> Twitter</li>
              <li><i class="fa-brands fa-linkedin"> </i> Linkding</li>
            </ul>
            </div>
            </div>
            <div class="col-md-6 col-lg-4">
            <div class="contact">
                <h5 class="text-light">Newsletter</h5>
                <p class="lh-lg mt-3 mb-5">Subscribe to the site's newsletter.</p>
                <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
                <input type="button" value="Subscribe" class="btn">
                <ul class="d-flex mt-5 list-unstyled gap-3">
                <li>
                    <a  class="d-block text-light" href="#">
                    <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a  class="d-block text-light" href="#">
                    <i class="fa-brands fa-linkedin"></i>
                    </a>
                    <a  class="d-block text-light" href="#">
                    <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a  class="d-block text-light" href="#">
                    <i class="fa-sharp-duotone fa-solid fa-chevrons-left"></i>
                    <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>

                </ul>
            </div>
            
            </div>
        </div>
        </div>
    </div>
    <!-- End footer -->
    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>