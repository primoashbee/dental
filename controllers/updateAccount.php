<?php 
require "config.php";
require 'myFunctions.php';
session_start();
$who = checkIfLoggedIn();

if($who=="ADMIN"){
	$id = $_POST['id'];
	$pass=$_POST['pass'];
	$pass2=$_POST['pass2'];

	if($id=="" || $pass=="" || $pass2==""){
			$msg = array('msg'=>'ERROR: PARAMETER ERROR','code'=>'500');
			echo json_encode($msg);

	}elseif($pass!=$pass2){
		$msg = array('msg'=>'ERROR: PASSWORD DID NOT MATCH','code'=>'500');
			echo json_encode($msg);
	}else{
		$sql ="update accounts set password='".$pass."' where id='".$id."'";
		$flag=mysqli_query($conn,$sql);
			if($flag){
				$msg=array('msg'=>'Account Updated','code'=>'200');
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