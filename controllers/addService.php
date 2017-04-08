<?php 
require "config.php";
require 'myFunctions.php';
session_start();
$who = checkIfLoggedIn();
if($who=="ADMIN"){

	$service = $_POST['service'];
	$desc = $_POST['description'];
	$price = $_POST['price'];
	$sql ="Select * from services where service ='".$service."'";
	$res=mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)){
			$msg=array('msg'=>'Service Already Existing');
		}else{
			$sql ="insert into services(service,description,price,isDeleted)values('".$service."','".$desc."','".$price."','FALSE')";
				$flag=mysqli_query($conn,$sql);
					if($flag){
						$msg=array('msg'=>'Service Added!');
					}else{
						$msg=array('msg'=>'Something Went Wrong');
					}
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