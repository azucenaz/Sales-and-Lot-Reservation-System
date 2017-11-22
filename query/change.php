<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	if ($_POST['password'] ==$_POST['repassword']) 
	{
		
		$dbConn->query("UPDATE users SET password = '".$_POST['password']."' where user_id = '".$_SESSION['user_id']."'");

		$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully change password!</strong> 
                              </div>';
		header("location:../change.php");

	}
	else
	{
		$_SESSION['message'] = '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Password Doesnt Match!</strong> 
                              </div>';
		header("location:../change.php");
	}
}

?>