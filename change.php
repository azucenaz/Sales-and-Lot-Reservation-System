<?php
session_start();
include 'connection.php';
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Karmanta - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Karmanta, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sales And Lot Monitoring System</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
   
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
      <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">SALMS</a>
            <!--logo end-->

          <?php

            include 'header.php';

            ?>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
       <?php

             switch ($_SESSION['type']) 
             {
               case 'default':
                 include 'admin.php';
                 break;
               case 'admin':
                 include 'admin.php';
                break;
                case 'cashier':
                include 'cashier.php';
                break;
                case 'agent':
                  include 'agent.php';
                  break;
                 
               default:
                 include 'login.php';
                 break;
             }

             ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
           <section class="wrapper">
              <!-- Form validations -->              
              <h1 style="font-family:Verdana;">Change Password</h1>
                <?php 
              echo isset($_SESSION['message']) ? $_SESSION['message'] : ' ' ;
              unset($_SESSION['message']);?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Change Account
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="query/change.php">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <input class=" form-control"  name="password" type="password" required/>

                                          </div>

                                      </div>
                                       <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">Re Password <span class="required">*</span></label>
                                          <div class="col-lg-5">
                                              <input class=" form-control"  name="repassword" type="password" required/>

                                          </div>

                                      </div>
                                       <div class="form-group ">
                                          <div class="col-lg-offset-4">

                                          <input type="submit" class="btn btn-primary btn-lg" name="submit">

                                          </div>

                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>

              </div>
        
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    


  </body>
</html>
