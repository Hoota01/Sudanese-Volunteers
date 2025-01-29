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
      <!-- logo for regular state and mobile devices -->
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
      </div>
    </nav>
  </header>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Latest volunteer opportunities</h1>  
            <div class="input-group input-group-lg">
                <input type="text" id="searchBar" class="form-control" placeholder="Search by name...">
                <span class="input-group-btn">
                  <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Filters</h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                  <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> City <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href=""  class="citySearch" data-target="Bur Sudan"><i class="fa fa-circle-o text-yellow"></i>Bur Sudan</a></li>
                      <li><a href="" class="citySearch" data-target="Atbarah"><i class="fa fa-circle-o text-yellow"></i> Atbarah </a></li>
                      <li><a href="" class="citySearch" data-target="al-Faw"><i class="fa fa-circle-o text-yellow"></i> al-Faw </a></li>
                     <!-- <li><a href=""  class="citySearch" data-target="Khartoum"><i class="fa fa-circle-o text-yellow"></i> Khartoum</a></li>-->
                      <li><a href="" class="citySearch" data-target="Dongola"><i class="fa fa-circle-o text-yellow"></i> Dongola </a></li>
                    </ul>
                  </li>
                <li class="treeview menu-open">
                    <a href="#"><i class="fa fa-plane text-red"></i> Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="treeview-menu">
                      <li><a href="" class="experienceSearch" data-target='1'><i class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='2'><i class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='3'><i class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='4'><i class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                      <li><a href="" class="experienceSearch" data-target='5'><i class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
          <?php
          $limit =4;
          $sql = "SELECT COUNT(id_jobpost) AS id FROM posts";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }
          ?>
          
            <div id="target-content">
              
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div> 
          </div>
        </div>
      </div>
    </section>
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

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>
<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("Volunteer_page.php?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>
