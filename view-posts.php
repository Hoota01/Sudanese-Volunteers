<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sudanees Voluntrees</title>
  <link rel="icon" href="img/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- font-awesome/6.7.2-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
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
    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
    <!--<span class="logo-lg"><b>Sudanees</b> Volantrees</span>-->
      <img src="img/icon.png" class="img-responsive">
    </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
            <li>
            <a href="index.php">Home</a>
            </li>
            <li>
            <a href="about.php">About Us</a>
            </li>
          <li>
          <a href="sign-up.php">Registration</a>
          </li>
          <li>
            <a href="login.php" class="active">Login</a>
          </li>  
          <?php } else { 
            if(isset($_SESSION['id_user'])) { 
          ?>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="about.php">about</a>
          </li>
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
        </ul>
      </div>
    </nav>
  </header>
  <div class="content-wrapper" style="margin-left: 0px;">
  <?php
  
    $sql = "SELECT * FROM posts INNER JOIN Organizations ON posts.id_company=Organizations.id_company WHERE id_jobpost='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) 
    {
      while($row = $result->fetch_assoc()) 
      {
  ?>

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-9 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['jobtitle']; ?></i></b></h2>
              <h2>gender :<?php echo $row['gender']; ?></h2> 
              <h3><i class="fa-solid fa-location-dot"></i> location :<?php echo $row['locations']; ?></h3>
            </div>
            <div class="pull-right">
              <a href="voluntree_Opportunities.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['city']; ?></span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></p>              
            </div>
            <div>
              <?php echo stripcslashes($row['description']); ?>
            </div>
            <?php 
            if(isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
            <div>
              <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
            </div>
            <?php } ?>
            
            
          </div>
          <div class="col-md-3">
            <div class="thumbnail">
              <img src="uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
              <div class="caption text-center">
                <h3><?php echo $row['companyname']; ?></h3>
                <h3>State : <?php echo $row['city']; ?></h3>
                <i class="fa fa-envelope"></i> : <?php echo $row['email']; ?>
                <hr>
                <div class="row">
                  
                  <div class="col-md-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php 
      }
    }
    ?>

    

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
