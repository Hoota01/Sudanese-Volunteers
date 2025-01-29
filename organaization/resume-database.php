<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-posts.php in URL.
if(empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}
require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sudanees Voluntrees</title>
  <link rel="icon" href="../img/icon.png">
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
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/Style.css">
  
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
     <img src="../img/icon.png" class="img-responsive">
    </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="edit-organaization.php"><i class="fa fa-tv"></i> My Organization</a></li>
                  <li><a href="create-post.php"><i class="fa fa-file-o"></i> Create Post</a></li>
                  <li><a href="my-posts.php"><i class="fa fa-file-o"></i> My Post</a></li>
                  <li><a href="voluntree-applications.php"><i class="fa fa-file-o"></i> Volunteer requests</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li class="active"><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Talent Database</i></h2>
            <p>In this section you can download resume of all candidates who applied to your volunteer posts</p>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Volunteer</th>
                      <th>Highest Qualification</th>
                      <th>Skills</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Download Resume</th>
                    </thead>
                    <tbody>
                    <?php
                       $sql = "SELECT users.* FROM posts INNER JOIN apply_post ON posts.id_jobpost=apply_post.id_jobpost  INNER JOIN users ON users.id_user=apply_post.id_user WHERE apply_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) 
                              {     

                                $skills = $row['skills'];
                                $skills = explode(',', $skills);
                      ?>
                      <tr>
                        <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td>
                          <?php
                          foreach ($skills as $value) {
                            echo ' <span class="label label-success">'.$value.'</span>';
                          }
                          ?>
                        </td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state']; ?></td>
                        <td><a href="../uploads/resume/<?php echo $row['resume']; ?>" download="<?php echo $row['firstname'].' Resume'; ?>"><i class="fa fa-file-pdf-o"></i></a></td>
                      </tr>

                      <?php

                        }
                      }
                      ?>

                    </tbody>                    
                  </table>
                </div>
              </div>
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
            <img src="../img/logo.png" alt="" class="md-4 ">
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
              <li>Home</li>
              <li>About</li>
              <li> Organizations</li>
              <li>Volunteer</li>
            </ul>
          </div>
        </div>
        <div class="coln md-6 col-lg-2">
          <div class="links">
            <h5 class="text-light">Contact Us</h5>
            <ul class="list-unstyled lh-lg">
              <li><i class="fa-brands fa-whatsapp"> </i> Whatsap</li><b>
                <li></li>
              <li><i class="fa-brands fa-facebook"> </i>  Facebook</li><b>
                <li></li>
              <li><i class="fa-brands fa-x-twitter"> </i> Twitter</li><b>
                <li></li>
              <li><i class="fa-brands fa-linkedin"> </i> Linkding</li><b>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
