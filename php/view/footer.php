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
		function contTime(unix_timestamp){
			// create a new javascript Date object based on the timestamp
			// multiplied by 1000 so that the argument is in milliseconds, not seconds
			var date = new Date(unix_timestamp*1000);
			// hours part from the timestamp
			var hours = date.getHours();
			// minutes part from the timestamp
			var minutes = date.getMinutes();
			// seconds part from the timestamp
			var seconds = date.getSeconds();
			
			// will display time in 10:30:23 format
			var formattedTime = hours + ':' + minutes + ':' + seconds;
		}
	</script>
    </body>
</html>
<?php } ?>