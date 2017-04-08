<?php 
require "config.php";
require 'myFunctions.php';
session_start();
$who = checkIfLoggedIn();
if($who=="ADMIN"){
	$id = $_POST['id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$age = $_POST['age'];
	$bday = $_POST['bday'];
	$gender = $_POST['gender'];
	if($id=="" || $fname=="" || $lname=="" || $age==0 || $bday =="" || $gender==""){

			$msg = array('msg'=>'ERROR: PARAMETER ERROR','code'=>'500');
			echo json_encode($msg);

	}else{
		$sql ="update customers set lname ='".$lname."', fname ='".$fname."', age ='".$age."', birthday ='".$bday."', gender ='".$gender."' where id='".$id."'";
		$flag=mysqli_query($conn,$sql);
			if($flag){
				$msg=array('msg'=>'Service Updated','code'=>'200');
			}else{
				$msg=array('msg'=>'Something Went Wrong','code'=>'500');
			}	
			echo json_encode($msg);
	}

}elseif($who=="PATIENT"){
	$msg = array('msg'=>'ERROR: AUTHENTICATION ERROR','code'=>'1');
	echo json_encode($msg);
}else{
	$msg = array('msg'=>'ERROR: AUTHENTICATION ERROR | UNIDENTIFIED SOURCE','code'=>'1');
	echo json_encode($msg);
}
?>