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
				<h3>List of Accounts</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 <div class="container mtb">
	 	<table class="table table-responsive">
	 		<thead>
	 			<th>Last Name</th>
	 			<th>Password</th>
	 			<th>Action</th>
	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from accounts where isAdmin ='FALSE'";
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 			<tr>
	 				<td>
	 					<?php echo $data['username'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['password'];?>
	 				</td>
	 				<td>
	 					<button class="btn btn-sm btn-warning update-account" id="<?php echo $data['id']; ?>" 
	 					username ="<?php echo $data['username'];?>"
	 					><span class="glyphicon glyphicon-pencil"></span></button>
	 					<button class="btn btn-sm btn-danger" id="<?php echo $data['id']; ?>" 
	 					username ="<?php echo $data['username'];?>"
	 					><span class="glyphicon glyphicon-trash"></span></button>
	 				</td>
	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	<a href="../sign-in.php"><buton type="button" class="btn btn-lg btn-success" id="btnAddNewShow">Add New</buton></a>
	 </div><! --/container -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">Update Account</h4>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
        		<label for ="txtUsername" class="control-label">Username</label>
        		<input type="text" id="txtUsername" class="form-control" readonly="">
        	</div>
        	<div class="form-group">
        	<div class="form-inlne">
        	<div class="col-xs-6">
        		<label for ="txtPassword" class="control-label">New Password</label>
        		<input type="text" id="txtPassword" class="form-control">
        	</div>
        	<div class="col-xs-6">
        		<label for ="txtPassword_confirm" class="control-label">Confirm Password</label>
        		<input type="text" id="txtPassword_confirm" class="form-control">
        	</div>
        	</div>
        	</div>
        	<div class="clearfix"></div>
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

<?php require '../includes/script.php';?>
<script>
	var id,pass,pass2
		$('.update-account').click(function(){
			id=$(this).attr('id')
			name = $(this).attr('username')
			$('#txtUsername').val(name)
			$('#myModal').modal('show')
		})
		$("#btnSubmit").click(function(){
				pass = $('#txtPassword').val()
				pass2 = $('#txtPassword_confirm').val()
			if(id==""||pass==""||pass2==""){
				alert('Please Fill All')
			}else if(pass!=pass2){
				alert('Password did not matched')

			}else{

				
				$.ajax({
					url:'../controllers/updateAccount.php',
					data:{id:id,pass:pass,pass2:pass2},
					dataType:'JSON',
					type:'POST',
					success:function(data){
						if(data.code="200"){
							alert(data.msg)
							location.reload()
						}else{
							alert(data.msg)
						}
					}
				})
			}
		})
</script>
  </body>
</html>
