 	<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/retina-1.1.0.js"></script>
	<script src="assets/js/jquery.hoverdir.js"></script>
	<script src="assets/js/jquery.hoverex.min.js"></script>
	<script src="assets/js/jquery.prettyPhoto.js"></script>
  	<script src="assets/js/jquery.isotope.min.js"></script>
  	<script src="assets/js/custom.js"></script>
  	<script src="assets/js/function.js"></script>
  	
<script>
	  		
  		$('#toLogout').click(function(){
  			$('#frmLogOut').modal('show')
  		})
      $('#toChangePass').click(function(){
        var email = $(this).attr('email')
        alert(email)
        $('#acctID').val(email)
        $('#frmChangePassword').modal('show')
      })
    
</script>
