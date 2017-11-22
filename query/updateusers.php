<?php
include '../connection.php';
session_start();

if (isset($_POST['submit'])) 
{

	if ($_POST['password'] == $_POST['password']) 
	{
		
	$dbConn->query("UPDATE users SET firstname = '".$_POST['firstname']."',middlename = '".$_POST['middlename']."',lastname = '".$_POST['lastname']."',status = '".$_POST['status']."',type = '".$_POST['type']."',username = '".$_POST['username']."',password = '".$_POST['password']."',contact = '".$_POST['contact']."' where user_id = '".$_POST['user_id']."' ");

		header("location:../listusers.php");
	}
	else
	{
		$_SESSION['message'] = '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Password Doesnt Match!</strong> 
                              </div>';
		header("location:../listusers.php");

	}
}

?>