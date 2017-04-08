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
				<h3>Make Appointment</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->

	</div><!-- /blue -->

	 <div class="container mtb" style="margin-top:-60px">

	<h1> List of Services </h1>
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
	<form action="reservenow.php" method="post">
	 	<table class="table table-responsive" 3>
	 		<thead>	
	 			<th></th>
	 			<th>Service Name</th>
	 			<th>Description</th>
	 		
	 		</thead>
	 		<tbody>
	 			<?php 
	 				$sql = "Select * from services order by service ASC";
	 				$res = mysqli_query($conn,$sql);
	 				while($data=mysqli_fetch_array($res)){
	 			?>
	 		
	 			<tr>
	 				<td style="text-align:right;width:25px;">
	 					<input type="checkbox" name="services[]" value="<?php echo $data['id']; ?>">
	 				</td>
	 				<td>
	 					<?php echo $data['service'];?>
	 				</td>
	 				<td>
	 					<?php echo $data['description'];?>
	 				</td>

	 				
	 			</tr>
	 			<?php
	 				}
	 			?>
	 		</tbody>
	 	</table>
	 	<div class="form-inline">
		

		<label for="date">Date:</label>
		<input type="date" name="date" id="date" class="form-control" required=>
		<span style="margin-left:25px"></span>
		<label for="time">Time:</label>
		<select  name="time" id="time" class="form-control" required>

			<option value="">--------</option>
			<option value="9:00AM">9:00 AM</option>
			<option value="10:00AM">10:00 AM</option>
			<option value="11:00AM">11:00 AM</option>
			<option value="1:00PM">1:00 PM</option>
			<option value="2:00PM">2:00 PM</option>
			<option value="3:00PM">3:00 PM</option>
			<option value="4:00PM">4:00 PM</option>
		</select>
			<span style="margin-left:25px"></span>
			<input type="submit" class="btn btn-lg btn-default">
		</div>

	 </div><! --/container -->

	  
	 </form>


	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	<?php require '../includes/footer.php'; ?>

  <body>

<?php require '../includes/account-script.php';?>

  </body>
</html>
