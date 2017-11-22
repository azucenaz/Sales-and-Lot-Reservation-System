<?php

session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{

	$checkpenaly = $dbConn->query("SELECT * FROM settings");
	if ($checkpenaly->rowCount() > 0 ) 
	{
		$dbConn->query("UPDATE settings SET penalty_rate = '".$_POST['penalty']."' ");
		$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Updated! Penalty Rates : '.$_POST['penalty'].'</strong> 
                              </div>';
		header("location:../settings.php");
	}
	else
	{
		$dbConn->query("INSERT INTO settings (penalty_rate) VALUES ('".$_POST['penalty']."') ");
	$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Updated! Penalty Rates : '.$_POST['penalty'].'</strong> 
                              </div>';
		header("location:../settings.php");
	}

}

?>