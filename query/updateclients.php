<?php
session_start();
include '../connection.php';

if (isset($_POST['submit'])) 
{
	
	
	$dbConn->query("UPDATE clients SET firstname = '".$_POST['firstname']."' , middlename = '".$_POST['middlename']."',lastname = '".$_POST['lastname']."',contact = '".$_POST['contact']."',address = '".$_POST['address']."' where client_id = '".$_POST['client_id']."' ");
	$_SESSION['message'] = '<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Updated!</strong> 
                              </div>';
	header("location:../listclient.php");

}


?>