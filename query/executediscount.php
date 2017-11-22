<?php

session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{

	$checkpenaly = $dbConn->query("SELECT * FROM settings");
	if ($checkpenaly->rowCount() > 0 ) 
	{
		$dbConn->query("UPDATE settings SET discount = '".$_POST['discount']."' ");
		$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Updated! Discount rates : '.$_POST['discount'].'</strong> 
                              </div>';
		header("location:../settings.php");
	}
	else
	{
		$dbConn->query("INSERT INTO settings (discount) VALUES ('".$_POST['discount']."') ");
	$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Updated! Discount rates : '.$_POST['discount'].'</strong> 
                              </div>';
		header("location:../settings.php");
	}

}

?>