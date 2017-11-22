<?php 
session_start();
include 'connection.php';

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

$_SESSION['trans_id'] = numberletter();

if (isset($_POST['submit'])) 
{

	$getinfo = $dbConn->query("SELECT * FROM own_lot where own_id = '".$_POST['own_id']."' ");
	$disinfo = $getinfo->fetch(PDO::FETCH_ASSOC);

	$currentmonths = $disinfo['months_paid'] + $_POST['totalmonths'];

	$change = $_POST['amount'] - $_POST['overall'];

	

 	$dbConn->query("INSERT INTO transactions (transaction_id,block_id,client_id,datepayment,total_paid,deposit) VALUES ('".$_SESSION['trans_id']."','".$_POST['block_id']."','".$_POST['client_id']."','".date("Y-m-d")."','".$_POST['amount']."','".$change."')");
 	$dbConn->query("UPDATE own_lot SET months_paid = '".$currentmonths."' WHERE own_id = '".$_POST['own_id']."' ");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="font-family:verdana;">
	<center>
		<table border="0" cellpadding="5" cellspacing="0" width="400px">
			<tr>
			<td colspan="3"><h1>OFFCIAL RECEIPT</h1></td>

			</tr>
			<tr>
				<td colspan="3"><b>INVOICE NO:</b><font color="red"> <?php echo $_SESSION['trans_id']; ?></font></td>
			</tr>
			
		</table>
		<table border="1" cellpadding="5" cellspacing="0" width="400px">
			<tr>
			<td><b>Particulars</b></td>
			<td><b>Total Paid</b></td>
			</tr>
			<tr>
			<td>LOT ID: <?php echo $_POST['block_id'];?></td>
			<td><?php echo $_POST['amount'];?></td>
			</tr>

		</table>

	</center>
</body>
</html>