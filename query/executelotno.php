<?php 

session_start();

include '../connection.php';

if (isset($_POST['submit'])) 
{
	$checklot  = $dbConn->query("SELECT  * FROM lot where lot_no = '".$_POST['lotno']."' ");
	if ($checklot->rowCount() == 1) 
	{
		$_SESSION['message'] = '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Already Exist!</strong> 
                              </div>';
		header("location:../addestate.php");

	}
	else
	{
		$insertlot = $dbConn->query("INSERT INTO lot (lot_no) VALUES ('".$_POST['lotno']."')");
		$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Add!</strong> 
                              </div>';
		header("location:../addestate.php");
	}
}

?>