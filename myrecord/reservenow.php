<?php 
require "../controllers/config.php";
require "../controllers/myFunctions.php";
session_start();

if(!isset($_POST['services'])){
$_SESSION['msg']="Select from the services";
//header('Location:reservation.php');
}else{
	$lists = $_POST['services'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$sql = "Select * from reservation where r_date='".$date."' and r_time ='".$time."'";
	
	$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)){
			$_SESSION['msg']="Date and Time already taken";
			header('Location:reservation.php');
			return;
		}
	$sql = $sql = "Select * from reservation where r_date='".$date."' and customer_id ='".$_SESSION['myID']."'";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)){
		$sql = "Delete from reservation where r_date='".$date."' and customer_id ='".$_SESSION['myID']."'";
		mysqli_query($conn,$sql);	
	}

	$sql = "Insert into reservation(customer_id,service_id,r_date,r_time,isApproved)values";
	$values="";
		foreach($lists as $x){
			//VALUES HERE THEN TRIM LAST COMMA
			$values=$values."('".$_SESSION['myID']."','".$x."','".$date."','".$time."','FALSE'),";
		}
	$flag = mysqli_query($conn,$sql.substr($values, 0, -1));
		if($flag){
			$_SESSION['msg']="Appointment Made! Appointment is upon review of the admin";
			header('Location:reservation.php');
			return;
		}else{
			$_SESSION['msg']="Something Went Wrong";
			header('Location:reservation.php');
			return;
		}

}


?>