<?php
function success($message){
?>
<div class="container">
	<span class='btn btn-info btn-lg btn-block text-center'>Success!!!</span>
	<div class='alert alert-success'>
	    <p>An email with your coupon is sent to you. Check your mail!!!</p>
	    <?php
	    	foreach($message as $msg){
	    		echo "<p>$msg</p>";
	    	}
	    ?>
	</div>
</div>
<?php
}
?>