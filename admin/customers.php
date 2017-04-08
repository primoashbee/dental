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
				<h3>List of Customers</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	 <div class="container mtb">
	 	<table class="table table-responsive">
	 		<thead>
	 			<th>Last Name</th>
	 			<th>First Name</th>
	 			<th>Email</th>
	 			<th>Birthday</th>
	 			<th>Age</th>
	 			<th>Gender</th>
	 			<th>Action</th>
	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from qryinformation where isAdmin='FALSE'";
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 			<tr>
	 				<td>
	 					<?php echo $data['lname'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['fname'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['email'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['birthday'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['age'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['gender'];?>
	 				</td>
	 				<td>
	 					<button class="btn btn-sm btn-warning update-customer" 
	 					id ="<?php echo $data['id']; ?>"
	 					lname="<?php echo $data['lname']; ?>" 
	 					fname ="<?php echo $data['fname'];?>"
	 					birthday="<?php echo $data['birthday'];?>"
	 					age="<?php echo $data['age'];?>"
	 					gender="<?php echo $data['gender'];?>"
	 					email="<?php echo $data['email'];?>"><span class="glyphicon glyphicon-pencil"></span>
	 					</button>
	 					<button class="btn btn-sm btn-danger" id="<?php echo $data['id']; ?>" 
						><span class="glyphicon glyphicon-trash"></span></button>
	 				</td>
	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	
	 </div><! --/container -->

<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">Update Customer Information</h4>
      </div>
      <div class="modal-body">
        <form action="" id="frmMain">
        	<div class="form-group">
        		<label for ="txtLastname" class="control-label">Last Name</label>
        		<input type="text" id="txtLastname" name="txtLastname" class="form-control" required="" >
        	</div>
        	<div class="form-group">
        		<label for ="txtFirstname" class="control-label">First Name</label>
        		<input type="text" id="txtFirstname" name="txtFirstname" class="form-control" required="">
        	</div>
        	<div class="form-group">
        		<label for ="txtGender" class="control-label">Gender</label>
        		<select class="form-control" id="txtGender" >
        			<option value="">Select</option>
        			<option value="Male">Male</option>
        			<option value="Female">Female</option>
        		</select>
        	</div>
        	<div class="form-group">
        	<div class="form-inline">
        		<div class="col-xs-6">
        		<label for ="txtBday" class="control-label">Birthday</label>
        		<input type="date" id="txtBday" name ="txtBday" required class="form-control required=""">
        		</div>
        		<div class="col-xs-6">
        		<label for ="txtAge" class="control-label">Age</label>
        		<input type="text" id="txtAge"  id="txtAge" class="form-control" readonly="" required="">
        		</div>
        	</div>
        	
        	</div>
        	<div class="clearfix"></div>
        	<div class="form-group">
        		<label for ="txtEmail" class="control-label">Email</label>
        		<input type="email" id="txtEmail" class="form-control" readonly="">
        	</div>        	
      
      </div>
      <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </form>
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
var id,fname,lname,age,gender,bday,email
	$('.update-customer').click(function(){
		id = $(this).attr('id')
		lname =$(this).attr('lname')
		fname =$(this).attr('fname')
		age =$(this).attr('age')
		email =$(this).attr('email')
		gender = $(this).attr('gender')
		bday = $(this).attr('birthday')
		
		$('#txtLastname').val(lname)
		$('#txtFirstname').val(fname)
		$('#txtEmail').val(email)
		$('#txtGender').val(gender)
		$('#txtAge').val(age)

		$('#myModal').modal('show');
	
		
	})
	$('#txtBday').change(function(){
		age = getAge($(this).val())
		
		$('#txtAge').val(age)
	})

	$('#btnSubmit').click(function(e){
		fname = $('#txtFirstname').val()
		lname = $('#txtLastname').val()
		age = $('#txtAge').val()
		email = $('#txtEmail').val()
		gender =$('#txtGender option:selected').val()
		if(bday==""){
				bday = $('#txtBday').val()
		}

	
		if(id==""||fname==""||lname==""||age==0||gender==""||bday==""){
			alert('Please fill fields')
			e.preventDefault();
		}else{
		
			$.ajax({
				url:'../controllers/updateCustomer.php',
				data:{id:id,fname:fname,lname:lname,age:age,bday:bday,gender:gender},
				dataType:'JSON',
				type:'POST',
				success:function(data){
					if(data.code=="200"){
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
