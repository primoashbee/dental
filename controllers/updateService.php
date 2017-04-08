<?php 
require "config.php";
require 'myFunctions.php';
session_start();
$who = checkIfLoggedIn();
if($who=="ADMIN"){

	$id = $_POST['id'];
	$desc = $_POST['description'];
	$sql ="update services set description ='".$desc."' where id='".$id."'";
	
	$flag=mysqli_query($conn,$sql);
		if($flag){
			$msg=array('msg'=>'Service Updated');
		}else{
			$msg=array('msg'=>'Something Went Wrong');
		}	
		echo json_encode($msg);
}elseif($who=="PATIENT"){
	$msg = array('msg'=>'ERROR: AUTHENTICATION ERROR');
	echo json_encode($msg);
}else{
	$msg = array('msg'=>'ERROR: AUTHENTICATION ERROR | UNIDENTIFIED SOURCE');
	echo json_encode($msg);
}
?>