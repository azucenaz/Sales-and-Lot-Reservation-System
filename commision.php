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
      <?php 

            $total = $dbConn->query("SELECT sum(contract_price) FROM own_lot where user_id = '".$_SESSION['user_id']."' ");
            $distotal = $total->fetch(PDO::FETCH_ASSOC);
        ?>
      
       <script type="text/javascript">
  window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "My Commission"    
      },
      animationEnabled: true,
      axisY: {
        title: ""
      },
      legend: {
        verticalAlign: "top",
        horizontalAlign: "center"
      },
      theme: "theme2",
      data: [

      {        
        type: "column",  
        showInLegend: true, 
        legendMarkerColor: "grey",
        legendText: "Total Sales",
        dataPoints: [     
        {y: <?php echo isset($distotal['sum(contract_price)']) ? $distotal['sum(contract_price)'] * 0.02 : '0';?>, label: "Total Sales"},
       
        ]
      }   
      ]
    });

    chart.render();
  }
  </script>
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
              <!--overview start-->
             <div class="col-lg-12">
                  <section class="panel">
                      <header class="panel-heading">
                          <h3>My Commission</Char>
                      </header>
                      <div class="panel-body">
                          <div class="row">
                            <div class="col-lg-12">
                            <!--line chart-->
                            <div class="panel terques-chart">
                                  <div class="panel-body">
                                      <div class="chart">
                                          <div class="heading">
                                              <span>Dashboard</span>
                                              <stron><?php
                                              include 'connection.php';
                                              $total = $dbConn->query("SELECT sum(contract_price) FROM own_lot where user_id = '".$_SESSION['user_id']."' ");
                                              $distotal = $total->fetch(PDO::FETCH_ASSOC);

                                              echo number_format($distotal['sum(contract_price)'],2);

                                              ?></strong>
                                          </div>
                                       
<script type="text/javascript" src="canvasjs.min.js"></script>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                      </div>
                                    
                                  </div>                          
                            </div>
                            <!--line chart-->
                          </div>
                          </div>
                      </div>
                      </div>
                    </section>
              </div>
              

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
