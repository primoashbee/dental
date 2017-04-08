<?php 
require "../controllers/config.php";
require "../controllers/myFunctions.php";
session_start();
$id = $_GET['id'];
if(isEmpty($id)){
	header("location:javascript://history.go(-1)");
}else{
	$sql = "Update customers set lname='".$_POST['lastname']."', age ='".$_POST['age']."', fname='".$_POST['firstname']."',birthday='".$_POST['birthday']."', gender='".$_POST['gender']."' where id ='".$id."'";

	$flag = mysqli_query($conn,$sql);

	if($flag){
		$_SESSION['msg']="INFORMATION UPDATED";
		header('Location:accounts.php');
		return;
	}	
}

?>