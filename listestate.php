<?php
session_start();
include 'connection.php';
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
    <!-- easy pie chart-->

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
              <!-- page start-->
              <h1 style="font-family:verdana;">List of Estate</h1>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Estates
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
  <thead>
    <th>Lot No</th>  
          <th>Block No</th>
          <th>Downpayment</th>
          <th>Price</th>
          <th>Description</th>
          <th>Action(s)</th>
  </thead>
  <tbody> 
     <?php 

          $getlot = $dbConn->query("SELECT * FROM block");
          while ($dislot = $getlot->fetch(PDO::FETCH_ASSOC)) 
          {
          
        ?>
        <tr class="odd gradeX">
          <td><?php echo $dislot['lot_no'];?></td>
          <td><?php echo $dislot['block_no'];?></td>
          <td><?php echo number_format($dislot['price'],2);?></td>
          <td><?php echo number_format($dislot['downpayment'],2);?></td>
          <td><a href="details.php?id=<?php echo $dislot['block_id'];?>">See Descriptions</a></td>
          <td><a class="btn btn-primary"><span class="icon-pencil"></span></a></td>
          </tr>
        <?php } ?>              
    

    
  </tbody>
</table>
                      </section>
                  </div>
              </div>
              <!-- page end-->
          </section>
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
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>

    <!-- data tables js -->
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <!-- dynamic table cuatom script for this page only-->
    <script src="js/dynamic-table.js"></script>
  

  </body>
</html>
