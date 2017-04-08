<?php 
require "../controllers/config.php";
require "../controllers/myFunctions.php";
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
if(isEmpty($email) || isEmpty($password)){
	header("location:javascript://history.go(-1)");
}else{
	$x=changePassword($email,$password);
	if($x){
		if($_SESSION['user']=="ADMIN"){
			$_SESSION['msg']="PASSWORD UPDATED!";
			header("Location:index.php");
		}else{
			$_SESSION['msg']="PASSWORD UPDATED!";
			header("Location:index.php");
		}
	}
}


?>