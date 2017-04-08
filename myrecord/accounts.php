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
				<h3>My Account</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->

	</div><!-- /blue -->

	 <div class="container mtb" style="margin-top:-60px">
<h3> Update Information </h3>
	
    <?php if(isset($_SESSION['msg'])) {?>
   		<?php  if($_SESSION['msg']=="Select from the services" || $_SESSION['msg']=="Date and Time already taken"){ ?>
				<div class="alert alert-warning">
		    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>ERROR!</strong> <?php echo $_SESSION['msg'] ?>
				</div>
		<?php }else{ ?> 
				<div class="alert alert-success">
		    	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				  <strong>Success!</strong> <?php echo $_SESSION['msg'] ?>
				</div>
		<?php }
		unset($_SESSION['msg']);
		}
	?>
	<?php 
		$sql = "Select * from qryinformation where username = '".$_SESSION['username']."'";
	
		$res = mysqli_query($conn,$sql);
		$data = mysqli_fetch_array($res);

	?>
	<form action="updateinfo.php?id=<?php echo $_SESSION['myID']?>" method ="POST">

		<div class="form-group">
			<label for="lastname">Last name</label>
			<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $data['lname']?>" required>
		</div>
		
		
		<div class="form-group">
			<label for="firstname">First name</label>
			<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $data['fname']?>" required> 
		</div>
		
		<div class="form-inline">
			<label for="birthday">Birthday</label>
			<input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $data['birthday']?>" required style="width:150px">
						<label for="age" style="margin-left:25px">Age</label>
			<input type="number" name="age" id="age" class="form-control" value="<?php echo $data['age']?>" required style="width:100px;">
			<label for="gender" style="padding-left:50px">Gender</label>
			<select  name="gender" id="gender" class="form-control" required style="width:150px"> 
				<option value="<?php echo $data['gender']?>"><b><?php echo $data['gender'] ?></b></option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
			</select>
				
		</div>

		<div class="form-group">

		</div>
		
	
		<div class="form-group">
	
		</div>
		<div class="clearfix">
		<button class="btn btn-default" type="submit">Submit</button>
		</div>

		</div>

	</form>	
</div>

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<?php require '../includes/footer.php'; ?>

  <body>

<?php require '../includes/account-script.php';?>
	<script>
		$('#birthday').change(function(){
			var Q4A = "Your birthday is: ";
			var Bdate = document.getElementById('birthday').value;
			var Bday = +new Date(Bdate);
			age = ~~ ((Date.now() - Bday) / (31557600000))
			Q4A += Bdate + ". You are " + ~~ ((Date.now() - Bday) / (31557600000));
			$('#age').val(age)
		})
	</script>
  </body>
</html>
