<?php

session_start();
include '../connection.php';

if (isset($_POST['fullpayment'])) 
{

}

function numberletter() 
{
          $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          srand((double)microtime()*1000000);
          $i = 0;
          $passii = '' ;
          while ($i <= 8) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $passii = $passii . $tmp;
            $i++;
          }
          return $passii;
}

$transactionsid = numberletter();




if (isset($_POST['payterms']))
{
		$contract_price = $_POST['price'] - $_POST['downpayment'];
$monthly = ($_POST['price'] - $_POST['downpayment']) / $_POST['noterms'];



	$insert = $dbConn->query("INSERT INTO own_lot (client_id,block_id,downpayment,terms,monthly,contract_price,datepayment,balance) VALUES ('".$_POST['client_id']."','".$_POST['block_id']."','".$_POST['downpayment']."','".$_POST['noterms']."','".$monthly."','".$contract_price."','".date("Y-m-d")."','".$contract_price."') ");
	$dbConn->query("INSERT INTO transactions (transaction_id,block_id,client_id,datepayment,total_paid,user_id) VALUES ('".$transactionsid."','".$_POST['block_id']."','".$_POST['client_id']."','".date('Y-m-d')."','".$_POST['downpayment']."','".$_SESSION['user_id']."') ");
	$update = $dbConn->query("UPDATE block SET client_id = '".$_POST['client_id']."' ");
}
// header("location:../payments.php");
?>

<<!DOCTYPE html>
<html>
<head>
  <title>RECEIPT</title>
</head>
<body style="font-family:Lucida Console;">
<center>
<h1>Receipt No: <?php echo $transactionsid; ?></h1>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td>Name</td>
    <td>Lot </td>
    <td>Downpayment</td>
  </tr>
  <tr>
    <td><?php 
  $getblock = $dbConn->query("SELECT * FROM clients where client_id = '".$_POST['client_id']."' ");
  $disblock = $getblock->fetch(PDO::FETCH_ASSOC);

  echo $disblock['firstname'].' '.$disblock['lastname'];
  ?></td>
  <td><?php 
  $getblock = $dbConn->query("SELECT * FROM block where block_id = '".$_POST['block_id']."' ");
  $disblock = $getblock->fetch(PDO::FETCH_ASSOC);

  echo $disblock['lot_no'].'-'.$disblock['block_no'];
  ?></td>
  <td><?php echo $_POST['downpayment'];?></td>
  </tr>
</table>
</center>
</body>
</html>