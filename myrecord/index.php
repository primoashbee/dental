<?php 
session_start();
require "../controllers/config.php";
require '../controllers/myFunctions.php';
$who = checkIfLoggedIn();

if($who=="ADMIN"){

}elseif($who=="PATIENT"){
}else{
	header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require '../includes/account-heading.php'; 
?>

  <body>

<?php require '../includes/patient-header.php';?>
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">

			<div class="row">
				<h3>Lists of Services Offered</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->

	</div><!-- /blue -->

	 <div class="container mtb">
	 	    <?php if(isset($_SESSION['msg'])) {?>
	    	<div class="alert alert-success">
	    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong> Password successfully changed!
			</div>
	<?php 

		unset($_SESSION['msg']);
	}
	?>
	 	<table class="table table-responsive">
	 		<thead>
	 			<th>Date of Reservation</th>
	 			<th>Time </th>
	 			<th>Status of Reservation</th>
	 			<th>Action</th>

	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from qrymysummary where id ='".$_SESSION['myID']."'";
	 			
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 			<tr>
	 				<td>
	 					<?php echo $data['r_date'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['r_time'];?>
	 				</td>	
	  				<td>
	 					<?php if ($data['isApproved']=="FALSE"){
	 						echo "PENDING";
	 					}else{
	 						echo "APPROVED";
	 					}
	 					;?>
	 				</td>
	 				<td>
	 					<button class="btn btn-sm btn-default view-me"  date="<?php echo $data['r_date']; ?>"  
						time="<?php echo $data['r_time'] ?>" id = "<?php echo $_SESSION['myID']?>"
	 					
	 					><span class="glyphicon glyphicon-eye-open"></span></button>
	 					<!--<button class="btn btn-sm btn-danger" id="<?php echo $data['id']; ?>" 
	 					><span class="glyphicon glyphicon-trash"></span></button>!-->
	 				</td>
	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	<buton type="button" class="btn btn-lg btn-success" id="btnAddNewShow">Add New</buton>
	 </div><! --/container -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" id="myModal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <div class="container">
						<ol id="myList"></ol>
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<?php require '../includes/footer.php'; ?>

  </body>

<?php require '../includes/account-script.php';?>
<script>
	$('.view-me').click(function(){
		var id = $(this).attr('id')
		var date = $(this).attr('date')
		var time = $(this).attr('time')
			$.ajax({
				url:'ajax.php',
				data:{id:id,date:date,time:time,request:'getMyRecords'},
				dataType:'JSON',
				type:'POST',
				success:function(data){
					$('#myList').empty()
					$.each(	data,function(k,v){
						$('#myList').append('<li>'+v.service+'</li>')
					})
				}
			})
		$('#myModal').modal('show')
	})

</script>
  
</html>
