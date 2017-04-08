<?php 
require "../controllers/config.php";
require '../controllers/myFunctions.php';
session_start();
$id = $_GET['id'];
$date= $_GET['date'];
$time = $_GET['time'];
$type=$_GET['type'];
if($type=="APPROVE"){
	$sql ="Update reservation set isApproved='TRUE' where customer_id='".$id."' and r_time='".$time."'  and r_date='".$date."'";
	$flag = mysqli_query($conn,$sql);
	if($flag){
		$_SESSION['msg'] ="RESERVATION APPROVED";
	}else{
		$_SESSION['msg'] ="SOMETHING WENT WRONG";

	}
}else if($type=="DISAPPROVE"){
	$sql ="Update reservation set isApproved='FALSE' where customer_id='".$id."' and r_time='".$time."'  and r_date='".$date."'";
	$flag = mysqli_query($conn,$sql);
	if($flag){
		$_SESSION['msg'] ="RESERVATION DISAPPROVED";
	}else{
		$_SESSION['msg'] ="SOMETHING WENT WRONG";

	}
}
header('Location:reservation.php');
?>