<?php 
require "config.php";
require "myFunctions.php";
$lname = $_POST['lastname'];
$fname = $_POST['firstname'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_conf = $_POST['password_confirmation'];
session_start();
if(!(isEmpty($lname) || isEmpty($fname) || isEmpty($email) || isEmpty($password) || isEmpty($password_conf))){
	if($password==$password_conf){
	$_SESSION['msg'] = addAccount($email,$password,$lname,$fname);
	header('Location:../sign-in.php');
	}else{
	$_SESSION['msg'] ='Password didnt matched';
	}
		header('Location:../sign-in.php');
}else{
	$_SESSION['msg'] = 'Please Fill All';
		header('Location:../sign-in.php');
}


?>