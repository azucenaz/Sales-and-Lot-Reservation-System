<?php
session_start();
include '../connection.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>REPORTS</title>
</head>
<body style="font-family:Lucida Console;"><center>
<h1>Total Sales</h1>
<table cellpadding="10" cellspacing="0" border="1">
	<tr>
		<td>Transaction No</td>
		<td>Block ID</td>
		<td>Client Name</td>
		<td>Datepayment</td>
		<td>Total Payment</td>
	</tr>

	<?php
	$getreports = $dbConn->query("SELECT * FROM transactions where datepayment BETWEEN '".$_POST['datefrom']."' AND '".$_POST['dateto']."' ");
	while ($row = $getreports->fetch(PDO::FETCH_ASSOC)) 
		{
	
	?>
	<td><?php echo $row['transaction_id'];?></td>
	<td><?php 
	$getblock = $dbConn->query("SELECT * FROM block where block_id = '".$row['block_id']."' ");
	$disblock = $getblock->fetch(PDO::FETCH_ASSOC);

	echo $disblock['lot_no'].'-'.$disblock['block_no'];
	?></td>
	<td><?php 
	$getblock = $dbConn->query("SELECT * FROM clients where client_id = '".$row['client_id']."' ");
	$disblock = $getblock->fetch(PDO::FETCH_ASSOC);

	echo $disblock['firstname'].' '.$disblock['lastname'];
	?></td>
	<td><?php echo $row['datepayment'];?></td>
	<td><?php echo $row['total_paid'];?></td>

	<?php
		}
	?>


</table>
</center>
</body>
</html>