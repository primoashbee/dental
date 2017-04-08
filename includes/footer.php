	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-12">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>REYES-PALOMER DENTAL CLINIC</p>
		 		</div>
		 	
		 		</div>
		 	
		 	</div><!--/row -->
	 	</div><!--/container -->
	 </div><!--/footerwrap -->


<div class="modal fade" id="frmLogOut">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">Warning</h4>
      </div>
      <div class="modal-body">
      	<h1>Are you sure want to Log Out?</h1>
      </div>
      <div class="modal-footer">
        <a href="../admin/logout.php">
        	<button type="button" class="btn btn-primary">Yes</button>
        </a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<form action ="updateMyAccount.php" method="POST">
<div class="modal fade" id="frmChangePassword">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="txtMode">Warning</h4>
      </div>
      <div class="modal-body">
      	<h1>Change Password</h1>
        
      	<input type="hidden" id="acctID" name="email">
      	<label for="txtPass1">New Password</label>
      	<input type="password" class="form-control" name="password" required>
       
      </div>
      <div class="modal-footer">
        <a href="../admin/logout.php">
        	<button type="submit" class="btn btn-primary">Yes</button>
        </a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 </form>
