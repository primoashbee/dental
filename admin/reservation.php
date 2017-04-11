<?php 
session_start();
require "../controllers/config.php";
require '../controllers/myFunctions.php';
$who = checkIfLoggedIn();

if($who=="ADMIN"){

}elseif($who=="PATIENT"){
	header('Location:../myrecord/index.php');
}else{
	header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../includes/heading.php'; 
?>

  <body>

<?php require '../includes/admin-header.php';?>
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>List of Reservation</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 <div class="container mtb">
	  <?php if(isset($_SESSION['msg'])) {?>
   		<?php  if($_SESSION['msg']=="RESERVATION APPROVED" || $_SESSION['msg']=="RESERVATION DISAPPROVED"){ ?>
				<div class="alert alert-success">
		    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>SUCCESS!</strong> <?php echo $_SESSION['msg'] ?>
				</div>
		<?php }else{ ?> 
				<div class="alert alert-alert">
		    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>ERROR!</strong> <?php echo $_SESSION['msg'] ?>
				</div>
		<?php }
		unset($_SESSION['msg']);
		}
	?>
	 	<table class="table table-responsive">
	 		<thead>
	 			<th>Client Name</th>
	 			
	 			<th>Date</th>
	 			<th>Time</th>
	 		
	 			<th>Status</th>
	 			<th>Action</th>
	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from qrymysummary order by r_time ASC";
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 			<tr>
	 				<td>
	 					<?php echo $data['fname'].' '.$data['lname'];?>
	 				</td>
	 			
	 				<td>
	 					<?php echo $data['r_date'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['r_time'];?>
	 				</td>
	 			
	 					<td><?php if($data['isApproved']=="FALSE"){
	 						echo "PENDING";
	 						}else{
	 						echo "APPROVED";
	 						}?></td>
	 				<td>
	 					<button class="btn btn-sm btn-default show-me" id="<?php echo $data['id']; ?>" 
	 					time ="<?php echo $data['r_time'];?>"
	 					date="<?php echo $data['r_date'];?>"><span class="glyphicon glyphicon-eye-open"></span></button>
	 					<?php 
	 					if ($data['isApproved']=="FALSE"){
	 					?>
	 					<a href="approved.php?<?php
	 					echo "type=APPROVE&id=".$data['id']."&date=".$data['r_date']."&time=".$data['r_time'];	
	 					?>"><button class="btn btn-sm btn-success" id="<?php echo $data['id']; ?>" 
	 					service ="<?php echo $data['service'];?>"
	 					description="<?php echo $data['description'];?>"><span class="glyphicon glyphicon-ok"></span></button></a>
	 					<?php		
	 					}
	 					?>

	 					<a href="approved.php?<?php
	 					echo "type=DISAPPROVE&id=".$data['id']."&date=".$data['r_date']."&time=".$data['r_time'];	
	 					?>"><button class="btn btn-sm btn-danger" id="<?php echo $data['id']; ?>" 
	 					service ="<?php echo $data['service'];?>"
	 					description="<?php echo $data['description'];?>"><span class="glyphicon glyphicon-trash"></span></button></a>
	 				</td>
	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	<buton type="button" class="btn btn-lg btn-success" id="btnAddNewShow">Reserve</buton>
	 </div><!--container !-->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">List of Services</h4>
      </div>
      <div class="modal-body">
       	<div class="clearfix"><ol id="list-item" style="padding-left:30px"></ol></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<?php require '../includes/footer.php'; ?>

  <body>

<?php require '../includes/script.php';?>
<script>
	$('.show-me').click(function(){
		id = $(this).attr('id')
		date = $(this).attr('date')
		time = $(this).attr('time')
		$.ajax({
			url:'showreservation.php',
			data:{id:id,time:time,date:date},
			dataType:'JSON',
			type:'POST',
			success:function(data){
					$('#list-item').empty()
					console.log(data)
					$.each(data,function(k,v){
						$('#list-item').append('<li>'+v.service+'</li>')
					})
			}
		})
		$('#myModal').modal('show')
	})
</script>
  </body>
</html>
