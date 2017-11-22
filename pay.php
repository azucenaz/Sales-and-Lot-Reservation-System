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
                <?php 
              echo isset($_SESSION['message']) ? $_SESSION['message'] : ' ' ;
              unset($_SESSION['message']);?>

              <?php 
                $getclient = $dbConn->query("SELECT * FROM clients where client_id = '".$_GET['id']."' ");
                $disclient = $getclient->fetch(PDO::FETCH_ASSOC);
              ?>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                          Summary
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="query/executepayments.php">
                                    <input type="hidden" value="<?php echo $_GET['id'];?>" name="client_id">
                                    <input type="hidden" value="<?php echo $_GET['lot'];?>" name="block_id">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Client Name:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              
                                                 <?php echo $disclient['firstname'].' '.$disclient['lastname']; ?>
                                          </label>
                                          <label for="fullname" class="control-label col-lg-2"><b>Address:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              
                                                 <?php echo $disclient['address']; ?>
                                          </label>
                                          </div>
                                          <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Contact:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              
                                                 <?php echo $disclient['contact']; ?>
                                          </label>
                                          <label for="fullname" class="control-label col-lg-2"><b>Details:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              <a href="viewclient.php?id=<?php echo $_GET['id'];?>">See Information</a>
                                          </label>
                                          </div>
                                          <hr>
                                          <?php 
                                          $getlot = $dbConn->query("SELECT * FROM block where block_id = '".$_GET['lot']."'");
                                          $dislot = $getlot->fetch(PDO::FETCH_ASSOC);
                                          ?>
                                          <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Estate Details</b> </label>
                                         
                                          
                                         
                                          </div>
                                           <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Price:</b> </label>
                                          <input type="hidden" value="<?php echo $dislot['price'];  ?>" name="price" id="price">
                                          <label for="fullname" class="control-label col-lg-2"><?php echo number_format($dislot['price'],2);?> </label>
                                         
                                          
                                         
                                          <label for="fullname" class="control-label col-lg-2"><b>Downpayment:</b> </label>
                                         
                                          <label for="fullname" class="control-label col-lg-2"><?php echo number_format($dislot['downpayment'],2);?> </label>
                                          <input type="hidden" id="realdown" value="<?php echo $dislot['downpayment']; ?>" >
                                         
                                          </div>
                                          <div class="form-group ">
                                            <a class="btn btn-success btn-lg col-md-offset-4" id="terms" >TERMS</a>
                                            <a class="btn btn-primary btn-lg" id="full">FULLPAYMENT</a>
                                          </div>


                                          <!-- para sa terms -->
                                          <div hidden id="paymentterms">
                                              <div class="form-group" style="font-size:20px;">
                                                 <label for="fullname" class="control-label col-lg-4"><b>Number of terms:</b> </label>
                                                  <div class="col-lg-2">
                                                  <input type="number" min="1" max="84" class="form-control" id="noterms" name="noterms"></div>
                                                  <label for="fullname" class="control-label col-lg-2"><b>Downpayment</b> </label>
                                                  <div class="col-lg-3">
                                                  <input type="number" class="form-control" id="downpayment" name="downpayment" required></div>
                                              </div>
                                               <div class="form-group" style="font-size:20px;">
                                                 <label for="fullname" class="control-label col-lg-4"><b>Monthly Amortization:</b> </label>
                                                 <label for="fullname" class="control-label col-lg-2" id="amortization"></label>
                                                 
                                                  <label for="fullname" class="control-label col-lg-2"><b>Date Payment</b> </label>
                                                 
                                                   <label for="fullname" class="control-label col-lg-2"><?php echo date("Y-m-d");?></label>
                                                 
                                              </div>
                                               <div class="form-group" hidden id="buttonproceed">
                                            <input type="submit" value="PROCEED" name="payterms" class="btn btn-success btn-lg col-md-offset-5" > 
                                            
                                          </div>
                                          </div>
                                          <!-- para sa fullpayment -->
                                          <div hidden id="paymentfull" >
                                          <div class="form-group" style="font-size:25px;">
                                          <?php 
                                          $getrates = $dbConn->query("SELECT * FROM settings");
                                          $disrates = $getrates->fetch(PDO::FETCH_ASSOC);

                                          ?>
                                          <label for="fullname" class="control-label col-lg-3"><b>Total:</b> </label>
                                           <label for="fullname" class="control-label col-lg-6"><?php echo number_format($dislot['price'],2);?> X  <?php echo $disrates['discount'].'% = ';
                                                    $discount = $dislot['price'] * $disrates['discount'] / 100; ?><b>Php <?php
                                                     $total = $dislot['price'] - $discount; echo number_format($total,2);?></b></label>
                                            
                                          </div>
                                           <div class="form-group">
                                            <input type="submit" value="PROCEED" name="fullpayment" class="btn btn-success btn-lg col-md-offset-5" > 
                                            
                                          </div>
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

    
       $("#full").click(function()
            {
          $("#paymentfull").show();
          $("#paymentterms").hide();
        });
       $("#terms").click(function()
            {
          $("#paymentfull").hide();
          $("#paymentterms").show();
        });

       $("#noterms").change( function()
       {
        $("#downpayment").val("");
       });

       $("#downpayment").change( function()
       {
          var downpayment = $(this).val();
          var realdown  = $("#realdown").val();
          var price = $("#price").val();
          var terms = $("#noterms").val();
          if ($("#noterms").val() != 0) 
          {

          if (parseFloat(downpayment) < realdown) 
            {
              alert("Invalid Downpayment");

              $(this).focus();
              $(this).val("");
            }
            else if (parseFloat(downpayment) >= parseFloat(price)) 
              {
                 alert("Make a fullpayment just click the button above");

              $(this).focus();
              $(this).val("");
              }
            else
              {
                var total = (parseFloat(price) - parseFloat(downpayment)) / parseFloat(terms);
                $("#amortization").html(total.toFixed(2));
                $("#buttonproceed").show();
                 $("#buttonproceed").focus();
              };
          }
          else
            {
              alert("Input first no of terms");
              $("#downpayment").val("");
              $("#noterms").focus();
            };
       });

      
     


    });
    </script>

  </body>
</html>
