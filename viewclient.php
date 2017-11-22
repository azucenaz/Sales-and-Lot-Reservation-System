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
              <ul class="sidebar-menu">                
                  <li>
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="payments.php">
                          <i class="icon-usd"></i>
                          <span>Payments</span>
                      </a>
                  </li>
                   <li>
                      <a class="" href="inquire.php">
                          <i class="icon-signin"></i>
                          <span>Inquire</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>Clients</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addclient.php">Add Client</a></li>
                          <li><a class="" href="listclient.php">List of Clients</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-user"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addusers.php">Add Users</a></li>
                          <li><a class="" href="listusers.php">List of Users</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_house_alt"></i>
                          <span>Estate</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addestate.php">Add Estate</a></li>
                          <li><a class="" href="listestate.php">List of Estate</a></li>
                      </ul>
                  </li>
                  
                 <li>
                      <a class="" href="transactions.php">
                          <i class="icon-list-alt"></i>
                          <span>Transactions</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="settings.php">
                          <i class="icon-wrench"></i>
                          <span>Settings</span>
                      </a>
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
           <section class="wrapper">
              <!-- Form validations -->              
              <h1 style="font-family:Verdana;">Client Information</h1>
                <?php 
              echo isset($_SESSION['message']) ? $_SESSION['message'] : ' ' ;
              unset($_SESSION['message']);?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          <?php 

                          $getclient = $dbConn->query("SELECT * FROM clients where client_id = '".$_GET['id']."' ");
                          $disclient = $getclient->fetch(PDO::FETCH_ASSOC);

                          echo $disclient['firstname'].' '.$disclient['lastname'];
                          ?>

                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="query/executelotno.php">
                                      <div class="form-group ">
                                          <label class="control-label col-lg-2">Name: </label>
                                          <label  class="control-label col-lg-2"><?php  echo $disclient['firstname'].' '.$disclient['lastname'];?> <span class="required">*</span></label>
                                          <label class="control-label col-lg-2">Address:</label>
                                          <label  class="control-label col-lg-2"><?php  echo $disclient['address'];?> <span class="required">*</span></label>
                                      </div>
                                       <div class="form-group ">
                                          <label class="control-label col-lg-2">Contact:</label>
                                          <label  class="control-label col-lg-2"><?php  echo $disclient['contact'];?> <span class="required">*</span></label>
                                         
                                      </div>
                                      <div class="form-group ">
                                          <label class="control-label col-lg-2">Details:</label>
                                         
                                         
                                      </div>
                                      <div class="form-group ">
                                          <div class="col-md-offset-1 col-md-10">
                                            <?php  echo $disclient['details'];?>
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
    <script>
    $(document).ready(function()
    {

      $("#price").change( function()
      {
       $("#downpayment").val("");
      });

       $("#downpayment").change( function()
      {
        var price = $("#price").val();
        var downpayment = $(this).val();
        if (parseFloat(price) < parseFloat(downpayment)) 
          {
            alert("Downpayment is greather than price");
            $(this).val("");
          };
      });

     


    });
    </script>

  </body>
</html>
