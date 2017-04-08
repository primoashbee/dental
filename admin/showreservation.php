<?php 
require "../controllers/config.php";
require '../controllers/myFunctions.php';
session_start();
$id = $_POST['id'];
$date= $_POST['date'];
$time = $_POST['time'];

$sql ="Select * from qryreservation where id='".$id."' and r_time='".$time."'  and r_date='".$date."'";

$res = mysqli_query($conn,$sql);
while($data=mysqli_fetch_array($res)){
	$json[]=array('service'=>$data['service']);
}
echo json_encode($json);
?>