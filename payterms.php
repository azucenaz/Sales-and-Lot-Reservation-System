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
                $getclient = $dbConn->query("SELECT * FROM clients where client_id = '".$_GET['clientid']."' ");
                $disclient = $getclient->fetch(PDO::FETCH_ASSOC);
              ?>
              <?php 
                $getprice = $dbConn->query("SELECT * FROM own_lot where own_id = '".$_GET['id']."' ");
                $disprice = $getprice->fetch(PDO::FETCH_ASSOC);
              ?>
               <?php

      $_SESSION['start'] = $disprice['own_id'];



function nextMonth($date, $format='c')
{   
    include 'connection.php';
    $getaccount = $dbConn->query("SELECT * FROM own_lot where own_id = '".$_SESSION['start']."' ");
                           $disacc = $getaccount->fetch(PDO::FETCH_ASSOC);                       

    $timestamp  = strtotime($date);
    $start_Y    = date('Y', $timestamp);
    $start_m    = date('m', $timestamp);
    $start_d    = date('d', $timestamp);

    // MAKE A TIMESTAMP FOR THE FIRST, LAST AND REQUESTED DAY OF NEXT MONTH
    $timestamp_first = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1,  1, $start_Y);
    $timestamp_last  = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1, date('t', $timestamp_first), $start_Y);
    $timestamp_try   = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1, $start_d, $start_Y);

    // USE THE LESSER OF THE REQUESTED DAY AND THE LAST OF THE MONTH
    if ($timestamp_try > $timestamp_last) $timestamp_try = $timestamp_last;
    $good_date = date($format, $timestamp_try);

    return array
    ( $good_date
    , $start_d
    , date('d', $timestamp_try)
    )
    ;
}

list
    ( $safe_date
    , $requested_day
    , $actual_day
    ) = nextMonth($disprice['datepayment'], 'Y-m-d');
   

      ?>
       <?php


$date1 = $disprice['datepayment'];
$date2 = date("Y-m-d");

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

$year1 = date('Y', $ts1);
$year2 = date('Y', $ts2);

$month1 = date('m', $ts1);
$month2 = date('m', $ts2);


$day1 = date('d', $ts1);
$day2 = date('d', $ts2);
                                  
  $getrates = $dbConn->query("SELECT * FROM settings");
  $disrates = $getrates->fetch(PDO::FETCH_ASSOC);
     $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

    if (date("Y-m-d") <= $safe_date) 
    {
      $totalpayment = $disprice['monthly'] * 1;
      $totalpenalty = 0;
      $overall = $totalpayment;     
     $months = 0;
    }
    else
    {

      if ($diff < 0 ) 
      {
        $diff = 1;
      }

      $totalpayment = $disprice['monthly'] * $diff;
      $totalpenalty = ($disrates['penalty_rate'] / 100) * $totalpayment;
      $overall = $totalpayment + $totalpenalty;
      $months = $diff;
    }
                                                    ?>



              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                        Account Summary
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " method="post" action="savetrans.php">
                                    <input type="hidden" value="<?php echo $disprice['own_id'];?>" name="own_id">
                                              <input type="hidden" value="<?php echo $disprice['block_id'];?>" name="block_id">
                                                  <input type="hidden" name="overall" value="<?php echo $overall?>">
                                              <input type="hidden" value="<?php echo $disprice['client_id'];?>" name="client_id">
                                   
                                      <div class="form-group">
                                          <label for="fullname" class="control-label col-lg-2"><b>Client Name:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              
                                                 <?php echo $disclient['firstname'].' '.$disclient['lastname']; ?>
                                          </label>
                                          <label for="fullname" class="control-label col-lg-2"><b>Monthly Amortization:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                                 <input readonly type="text" class="form-control" id="exampleInputEmail3" value="<?php echo number_format($disprice['monthly'],2)?>">
                                          </label>
                                          </div>
                                          <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Total months not paid:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              
                                                  <input readonly type="text" class="form-control" name="totalmonths" id="exampleInputEmail3" value="<?php echo $months?>">
                                          </label>
                                          <label for="fullname" class="control-label col-lg-2"><b>Total Penalty:</b> </label>
                                         
                                          
                                          <label for="fullname" class="control-label col-lg-2">
                                              <input readonly type="text" class="form-control" id="exampleInputEmail3" name="totalpenalty" value="<?php echo number_format($totalpenalty,2);?>">
                                          </label>
                                          </div>
                                          
                                           <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Deposit:</b> </label>
                                         <label for="fullname" class="control-label col-lg-2"> 
                                             <input readonly type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disprice['deposit']?>"> </label>
                                          <label for="fullname" class="control-label col-lg-2"><b>Balance:</b> </label>
                                         <label for="fullname" class="control-label col-lg-2"> 
                                            <?php echo number_format($disprice['balance'],2);?> </label>
                                        
                                         
                                          </div>
                                            <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2"><b>Total Months Paid:</b> </label>
                                         <label for="fullname" class="control-label col-lg-2"> 
                                            <?php echo $disprice['months_paid'];?>
                                        
                                        
                                         
                                          </div>
                                          <hr>
                                          <div class="col-lg-offset-2 col-lg-4">
                                          <input type="number" placeholder="Enter Amount" step="0.01" class="form-control" name="amount" min="<?php echo $overall;?>" required >
                                          </div>
                                          <input type="submit" class="btn btn-success" name="submit">
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
