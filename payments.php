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
              <h1 style="font-family:verdana;">Payments</h1>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              List of Accounts
                          </header>
                          <table class="table table-striped border-top" id="sample_1">
  <thead>
     <tr>
     <th></th>
      <th>Name</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Estate</th>
      <th>Action(S)</th>
    </tr>
  </thead>
 <tbody>  
      <?php 
        $getown = $dbConn->query("SELECT * FROM own_lot");
        
        while ($disown = $getown->fetch(PDO::FETCH_ASSOC)) 
        {
          $getclient = $dbConn->query("SELECT * FROM clients where client_id = '".$disown['client_id']."'");
          $disclient = $getclient->fetch(PDO::FETCH_ASSOC);
          $getlot = $dbConn->query("SELECT * FROM block where block_id = '".$disown['block_id']."' ");
          $dislot = $getlot->fetch(PDO::FETCH_ASSOC);
        
      ?>

      <tr>
      <td></td>
        <td><?php echo $disclient['firstname'].' '.$disclient['lastname'];?></td>
        <td><?php echo $disclient['contact'];?></td>
        <td><?php echo $disclient['address'];?></td>
        <td>Lot No: <?php echo $dislot['lot_no']?> Block No: <?php echo $dislot['block_no']?></td>
        <td>
         <a href="payterms.php?id=<?php echo $disown['own_id']?>&clientid=<?php echo $disown['client_id']?>" class="btn btn-primary">PAY</a>
        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $disown['own_id'];?>">PAY</button> -->
        </td>


      </tr>

      <!-- next payments -->

      <?php

      $_SESSION['start'] = $disown['own_id'];



// function nextMonth($date, $format='c')
// {   
//     include 'connection.php';
//     $getaccount = $dbConn->query("SELECT * FROM own_lot where own_id = '".$_SESSION['start']."' ");
//                            $disacc = $getaccount->fetch(PDO::FETCH_ASSOC);                       

//     $timestamp  = strtotime($date);
//     $start_Y    = date('Y', $timestamp);
//     $start_m    = date('m', $timestamp);
//     $start_d    = date('d', $timestamp);

//     // MAKE A TIMESTAMP FOR THE FIRST, LAST AND REQUESTED DAY OF NEXT MONTH
//     $timestamp_first = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1,  1, $start_Y);
//     $timestamp_last  = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1, date('t', $timestamp_first), $start_Y);
//     $timestamp_try   = mktime(0,0,0, $start_m+$disacc['months_paid'] + 1, $start_d, $start_Y);

//     // USE THE LESSER OF THE REQUESTED DAY AND THE LAST OF THE MONTH
//     if ($timestamp_try > $timestamp_last) $timestamp_try = $timestamp_last;
//     $good_date = date($format, $timestamp_try);

//     return array
//     ( $good_date
//     , $start_d
//     , date('d', $timestamp_try)
//     )
//     ;
// }

// list
//     ( $safe_date
//     , $requested_day
//     , $actual_day
//     ) = nextMonth($disown['datepayment'], 'Y-m-d');
   

      ?>




      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="<?php echo $disown['own_id'];?>" class="modal fade">   <?php


$date1 = $disown['datepayment'];
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
      $totalpayment = $disown['monthly'] * 1;
      $totalpenalty = 0;
      $overall = $totalpayment;     
      $months = 0;
    }
    else
    {
      $totalpayment = $disown['monthly'] * $diff;
      $totalpenalty = ($disrates['penalty_rate'] / 100) * $totalpayment;
      $overall = $totalpayment + $totalpenalty;
      $months = $diff;
    }
                                                    ?>
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">X</button>
                                              <h4 class="modal-title">Payment<label class="pull-right">Total: Php <?php 
                                              echo number_format($overall,2);?></label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="savetrans.php" method="post">
                                              <input type="hidden" value="<?php echo $disown['own_id'];?>" name="own_id">
                                              <input type="hidden" value="<?php echo $disown['block_id'];?>" name="block_id">
                                              
                                        <input type="hidden" name="overall" value="<?php echo $overall?>">
                                              <input type="hidden" value="<?php echo $disown['client_id'];?>" name="client_id">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Monthly Payment</label>
                                                      <input readonly type="text" class="form-control" id="exampleInputEmail3" value="<?php echo number_format($disown['monthly'],2)?>">
                                                  </div>

                                                 
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Total Months not paid</label>
                                                      <input readonly type="text" class="form-control" name="totalmonths" id="exampleInputEmail3" value="<?php echo $months?>">
                                                  </div>
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Total Penalty</label>
                                                      <input readonly type="text" class="form-control" id="exampleInputEmail3" name="totalpenalty" value="<?php echo number_format($totalpenalty,2);?>">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Deposit</label>
                                                      <input readonly type="text" class="form-control" id="exampleInputEmail3" value="<?php echo $disown['deposit']?>">
                                                  </div>
                                                    <div class="form-group">
                                                      <label for="exampleInputEmail1">Amount</label>
                                                      <input type="number" required class="form-control" id="exampleInputEmail3" step="0.01" min="<?php echo $overall;?>" name="amount">
                                                  </div>
                                                 
                                                  
                                                 
                                                  <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>


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
