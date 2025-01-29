<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
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
<body class="hold-transition skin-green sidebar-mini">
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
            <a href="#candidates">Volunteering Areas</a>
          </li>
          <li>
            <a href="#company">Voluntary Organizations</a>
          </li>
          <li>
            <a href="about.php">About Us</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
          <a href="sign-up.php">Registeration</a>
            
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <h1>Hand <strong>ON </strong>Hand</h1>
            <p>We Will Reach</p>
            <p><a class="btn btn-success btn-lg" href="voluntree_Opportunities.php" role="button">Volunteer Now</a></p>
          </div>
        </div>
      </div>
    </section>

    <section id="statistics" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Our Statistics</h1>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM posts";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Volunteer opportunities</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                  <?php
                      $sql = "SELECT * FROM Organizations WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Registered Organizations</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM users WHERE resume!=''";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>CV'S/Resume</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Registered Volunteers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      </div>
    </section>
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Latest volunteer opportunities</h1>            
            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM posts Order By Rand() Limit 6";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM Organizations WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>
<div class="col">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="attachment-img" src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image">
      <div class="caption">
      <strong class="attachment-heading">
            <?php echo $row['jobtitle']; ?>
                  </strong>
        <div>
        <h5>
            <?php echo $row1['companyname']; ?>  |
            Experience <?php echo $row['experience']; ?> Years
                  </h5>
          <h5> Age :<?php echo $row['maximumsalary']; ?></h5>
          <h5> gender :<?php echo $row['gender']; ?></h5>
          <h5><i class="fa-solid fa-location-dot"></i> location :<?php echo $row['locations']; ?></h5>
        </div>
        <p>
          <!-- Apply for the job button-->
          <a href="view-posts.php?id=<?php echo $row['id_jobpost']; ?>" class="mor" role="button">
          <i class="fa-solid fa-circle-chevron-right"></i> 
          </a>
          
        </p>
             </div>
                </div>
              </div>
           

          <?php
              }
            }
            }
          }
          ?>
    </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Volunteering Areas</h1>
            <p>Finding a volunteer opportunity is now easier. Create a profile and become part of a volunteer community with just one click of the mouse.</p>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/Helth.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Family Health Training and Awareness</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/cheld.jpg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Helping children with special needs</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/1s.jpeg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Environmental awareness campaigns</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/6s.jpg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Awareness and education campaigns</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/4s.png" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Organizing events and conferences</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail1 candidate-img">
              <img src="img/7s.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Help distribute food aid and fight famine</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="company" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Voluntary organizations</h1>
            <p>Looking for volunteers? Register your organizations for free, browse our talent pool, and post and track volunteer requests.</p>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <a href="https://www.facebook.com/p/Blue-sky-Organisation-100078919027177/">
            <div class="thumbnail company-img">
              <img src="img/blue.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">BLUE SKY</h3>
              </div>
            </div></a>
          </div>
          <div class="col-sm-4 col-md-4">
            <a href="https://igad.int/">
            <div class="thumbnail company-img">
              <img src="img/agad.jpeg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">IGAD</h3>
              </div>
            </div></a>
          </div>
          <div class="col-sm-4 col-md-4">
            <a href="https://awafy.org/about-us/">
            <div class="thumbnail company-img">
              <img src="img/awafy.jpeg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">AWAFY</h3>
              </div>
            </div></a>
          </div>
        </div>
      </div>
    </section>

    

<!-- start About section-->
<section id="about" class="content-header">
        <div class="container">
            <div class="row">
            <div class="col-md-12 text-center latest-job margin-bottom-20">
                <h1>Volunteering is not just a job</h1>                      
            </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                <img src="img/2g.jpg" class="img-responsive"><br>
                
                <p>Strong societies will only be built by all of us working together. Volunteering is the key to real change.”

“You don’t need huge resources to change lives; all you need is a heart full of good will and an outstretched hand to help.”</p>
            </div>
            <div class="col-md-4 about-text margin-bottom-20">
              
                <p>
                Volunteering is true giving; every moment you give makes the world a better place.”

“When you contribute to the service of others, you become part of the change you want to see in the world.”

“Volunteering is not just a job; it is an opportunity to make a difference in the lives of others and in your own.”

“Every small act of giving can make a big difference. Hurry up and join the caravan of goodness!”

“You will never learn anything about humanity like you do when you help. Volunteering is a bridge between us and those in need.”
                </p>
                <img src="img/3g.png" class="img-responsive">
            </div>
            <div class="col-md-4">
                <img src="img/1g.png" class="img-responsive"><br>
                <p>Volunteering is the work that brings us immeasurable rewards: inner happiness and a sense of accomplishment.”

“When you give of your time, you invest in the lives of others, and at the same time, you build the best version of yourself.”

“The more you contribute to the service of others, the more inner satisfaction you feel. Volunteering enhances your humanity and enriches your spirit.”</p>
            </div>
            </div>
        </div>
        </section>
<!-- End About section-->


  </div>
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


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
