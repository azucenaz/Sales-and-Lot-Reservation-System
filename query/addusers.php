<?php
include '../connection.php';
session_start();

if (isset($_POST['submit'])) 
{
	$checkaccount = $dbConn->query("SELECT * FROM users where username  = '".$_POST['username']."' ");
	if ($checkaccount->rowCount() > 0 ) 
	{
		$_SESSION['message'] = '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Already Exist!</strong> 
                              </div>';
			header("location:../listusers.php");
	}
	else
	{
		if ($_POST['password'] == $_POST['repassword'])
		{
			$dbConn->query("INSERT INTO users (address,status,type,username,password,firstname,middlename,lastname,contact) VALUES ('".$_POST['address']."','active','".$_POST['type']."','".$_POST['username']."','".$_POST['password']."','".$_POST['firstname']."','".$_POST['middlename']."','".$_POST['lastname']."','".$_POST['contact']."') ");
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
}


?>