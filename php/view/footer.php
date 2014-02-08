<?php
	function ramrodeal_footer(){
?>
	<div class="row">
		<footer>  
		       <p>&copy; RamroDeal 2013</p>
		 </footer>
	</div>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.js"></script>
	<script src="jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>js/primary.js"></script>
	<script>
		  $(function() {
		    $( "#datepicker" ).datepicker();
		  });
  	</script>
	<script>
	/*
	$(document).ready(function(){
		$('#signup').submit(function(e){
			$('#sgn_up').addClass('loader');
			e.preventDefault();
			$.ajax({
				url:"../controller/public/register.php",
				type:"POST"
				data:{
					email:$('.email').val(), password:$('.password').val(), confirmpassword:$('.confirmpassword'),
					fname:$('.fname').val(), lname:$('.lname').val(), contact_no:$('.contact_no').val(),
					city:$('.city').val(), district:$('.district').val(), country:$('.country').val(), 
					token:$('.token').val()
				}
			}).done(function(res){
					if(res=="true"){
						window.location="<?php Redirect::to('index.php'); ?>";
					}else{
						$('.error').text(res);
						$('#sgn_up').removeClass('loader');
					}
			});
		});
	});
*/
	</script>
    </body>
</html>
<?php } ?>