<?php
	function ramrodeal_footer(){
?>
	<div class="row">
	    <hr />
		<footer>  
		       <p>&copy; RamroDeal 2013</p>
		 </footer>
	</div>
	<script type="text/javascript" src="/RamroDeal/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="/RamroDeal/bootstrap/js/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="/RamroDeal/bootstrap/js/bootstrap.js"></script>
        <script src="/RamroDeal/bootstrap/js/jquery.datePicker-min.js" type="text/javascript"></script>
	<!--[if IE]><script type="text/javascript" src="/RamroDeal/bootstrap/js/jquery.bgiframe.min.js"></script><![endif]-->
	<script>
	    $(window).ready(function(){
		$('.date-pick').datePicker({clickInput:true});
	    });
	</script>
    </body>
</html>

<?php } ?>