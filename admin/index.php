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
	 			<th>Service Name</th>
	 			<th>Description</th>
	 			<th>Action</th>
	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from services order by service ASC";
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 			<tr>
	 				<td>
	 					<?php echo $data['service'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['description'];?>
	 				</td>
	 				<td>
	 					<button class="btn btn-sm btn-warning update-service" id="<?php echo $data['id']; ?>" 
	 					service ="<?php echo $data['service'];?>"
	 					description="<?php echo $data['description'];?>"><span class="glyphicon glyphicon-pencil"></span></button>
	 					<button class="btn btn-sm btn-danger" id="<?php echo $data['id']; ?>" 
	 					service ="<?php echo $data['service'];?>"
	 					description="<?php echo $data['description'];?>"><span class="glyphicon glyphicon-trash"></span></button>
	 				</td>
	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	<buton type="button" class="btn btn-lg btn-success" id="btnAddNewShow">Add New</buton>
	 </div><! --/container -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">Update Service</h4>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label for ="txtService" class="control-label">Service Name</label>
        		<input type="text" id="txtService" class="form-control" readonly="">
        	</div>
        	<div class="form-group">
        		<label for ="txtDesc" class="control-label">Description Name</label>
        		<input type="text" id="txtDesc" class="form-control">
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<?php require '../includes/footer.php'; ?>

  <body>

<?php require '../includes/account-script.php';?>
<script>
	var id,service,description,mode
	
		$('.update-service').click(function(){
			mode = "update"
			id = $(this).attr('id');
			service = $(this).attr('service');
			description = $(this).attr('description');
			$('#txtMode').html('Update Service')
			$('#txtDesc').val(description)
			$('#txtService').val(service)
			$('#txtService').attr('readonly','true')
			$("#myModal").modal('show');
		})
	$('#btnSubmit').click(function(){
		if(mode=="update"){
			service= $('#txtService').val()
			description = $('#txtDesc').val()
			if(id=="" || service =="" || description==""){
				alert('Please Fill All')
				return 0
			}
			$.ajax({
				url:'../controllers/updateService.php',
				data:{id:id,service:service,description:description},
				dataType:'JSON',
				type:'POST',
				success:function(data){
					alert(data.msg)
					location.reload()
				}
			})
		}else{
			service= $('#txtService').val()
			description = $('#txtDesc').val()
			if( service =="" || description==""){
				alert('Please Fill All')
				return 0
			}
			$.ajax({
				url:'../controllers/addService.php',
				data:{service:service,description:description},
				dataType:'JSON',
				type:'POST',
				success:function(data){
					alert(data.msg)
					location.reload()
				}
			})
	}
	
	})

	$('#btnAddNewShow').click(function(){
		mode = "add"
		$('#txtMode').html('Add New Service')
			id =""
			service = ""
			description = ""
			$('#txtDesc').val(service)
			$('#txtService').val(description)

			$('#txtService').attr('readonly',false)
			$("#myModal").modal('show');
		})
</script>
  </body>
</html>
