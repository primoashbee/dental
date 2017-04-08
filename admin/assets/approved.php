<?php 
require "../controllers/config.php";
require '../controllers/myFunctions.php';
session_start();
$id = $_GET['id'];
$date= $_GET['date'];
$time = $_GET['time'];

$sql ="Update reservation set isApproved='TRUE' where customer_id='".$id."' and r_time='".$time."'  and r_date='".$date."'";
$flag = mysqli_query($conn,$sql);
if($flag){
	$_SESSION['msg'] ="RESERVATION APPROVED";
}else{
	$_SESSION['msg'] ="SOMETHING WENT WRONG";

}
header('Location:reservation.php');
?>