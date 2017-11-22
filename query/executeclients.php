<?php
session_start();

include '../connection.php';

if (isset($_POST['submit'])) 
{

	$checkclient = $dbConn->query("SELECT * FROM clients where firstname = '".$_POST['firstname']."' AND middlename = '".$_POST['middlename']."' AND lastname = '".$_POST['lastname']."'");
	if ($checkclient->rowCount()  == 1) 
	{
		$_SESSION['message'] = '<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Already Exist!</strong> 
                              </div>';
		header("location:../addclient.php");
	}
	else
	{

		$dbConn->query("INSERT INTO clients (firstname,middlename,lastname,contact,address,details,user_id) VALUES ('".$_POST['firstname']."','".$_POST['middlename']."','".$_POST['lastname']."','".$_POST['contact']."','".$_POST['address']."','".$_POST['details']."','".$_SESSION['user_id']."')");
		$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Successfully Registered!</strong> 
                              </div>';
		header("location:../addclient.php");
	}

}

?>