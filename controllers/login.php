<?php 
require "config.php";
require "myFunctions.php";
session_start();
$username = $_POST['email'];
$password = $_POST['password'];

if(isEmpty($username) || isEmpty($password)){
	$_SESSION['msg'] = 'Please Provide Username and Password';
	header('Location:../sign-in.php');

}else{
	
	$type=logIn($username,$password);
	$_SESSION['user']=$type; 
		if($type=="ADMIN"){
			//go to admin page
			header('Location:../admin/index.php');
		}elseif($type=="PATIENT"){
			header('Location:../myrecord/index.php');
		}elseif($type=="4"){
			header('Location:../sign-in.php');
		}else{
			header('Location:../index.php');
		}
}

?>