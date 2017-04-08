<?php 
session_start();
require "../controllers/config.php";
$request  =  $_POST['request'];
if($request=="getMyRecords"){
$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$sql ="Select * from qryreservation where id='".$id."' and r_date='".$date."' and r_time='".$time."' ";
$res = mysqli_query($conn,$sql);
while($data=mysqli_fetch_array($res)){
$msg[]=array('service'=>$data['service'],'date'=>$data['r_date'],'time'=>$data['r_time'],'reserved_at'=>$data['reserved_at']);	
}
}
echo json_encode($msg);
?>