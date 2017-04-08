<?php 
require "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'includes/heading.php'; ?>

  <body>

<?php require 'includes/customer-header.php';?>
   
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>Sign In/Sign Up</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<!-- *****************************************************************************************************************
	 CONTACT WRAP
	 ***************************************************************************************************************** -->


	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->

	 <div class="container mtb">
	 	<div class="row">

	 		<div class="col-lg-8">
	 		<?php 
				if(isset($_SESSION['msg'])){
			?> 
			<div class="alert alert-success">
			  <strong><?php echo $_SESSION['msg']; ?></strong> 
			</div>
			<?php
				unset($_SESSION['msg']);
				}
			?>
				
	 			<h4>No Account Yet? Register</h4>
	 			<div class="hline"></div>
		 			<p><em><b>Note:</b></em> We will verify your application for registration! We'll send an email if we confirm your registration </p>
		 			<form  method="post" action="controllers/signup.php" class="form" role="form">
		 		
					  <div class="form-group col-sm-12">
					    <label for="lastname" class="control-label col-sm-1">Last Name</label>
					    	<div class="col-sm-5">
					    		<input type="text" class="form-control" id="lastname" name="lastname"  required="">
					  		</div>
					  	<label for="firstname" class="control-label col-sm-1">First Name</label>
							<div class="col-sm-5">
					  			<input type="text" class="form-control" id="firstname" name="firstname" required="">
					  		</div>
					  </div>
					 
					  <div class="form-group col-sm-12">
					    <label for="email" class="control-label col-sm-2">Email address (Username) </label>
					    	<div class="col-sm-10">
					    		<input type="email" class="form-control" id="email" name = "email" required="">
					    	</div>
					  </div>

					  <div class="form-group col-sm-12">
					    <label for="password" class="control-label col-sm-2">Password </label>
					    	<div class="col-sm-10">
					    		<input type="password" class="form-control" id="password" name="password" required="">
					    	</div>
					  </div>

					  <div class="form-group col-sm-12">
					  	<label for="password_confirmation" class="control-label col-sm-2">Confirm Password</label>
					  		<div class="col-sm-10">
					  			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="">
					  		</div>
					  </div>

					  <div class="form-group col-sm-12">
					  <div  class="control-label col-sm-2"></div>
					  	<div class="col-sm-2">
					  		<input type="submit" value="Register!" class="btn btn-default">
					  	</div>
					  </div>
					 
					</form>
			</div><! --/col-lg-8 -->
	 		
	 		<div class="col-lg-4">
		 		<h4>Sign In</h4>
		 		<div class="hline"></div>
		 		<p> Enter your Credentials</p>
		 	
					<form action="controllers/login.php" method = "post">
					  <div class="form-group col-sm-12">
					    <label for="email">Email Address </label>
					    	<div class="col-sm-10">
					    		<input type="email" class="form-control" id="email" name = "email" required="">
					    	</div>
					  </div>

					  <div class="form-group col-sm-12">
					    <label for="password">Password </label>
					    	<div class="col-sm-10">
					    		<input type="password" class="form-control" id="password" name="password" required="">
					    	</div>
					  </div>
					  <div class="col-sm-offset-1">
					  <input type="submit" class="btn btn-default">
					  </div>
			 		</form>
			</div>
	 	</div><! --/row -->
	 </div><! --/container -->

<?php 
	require 'includes/footer.php';
	require 'includes/script.php'
	
?>	

  </body>
</html>
