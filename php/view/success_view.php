<?php
function success($message){
?>
<br />
<div class="container">
	<span class='btn btn-info btn-lg btn-block text-center'>Success!!!</span>
	<div class='alert alert-success'>
<?php
	    if(Session::exists('home')){
?>
    <div class='alert alert-success'>
        <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php
    }
    	foreach($message as $msg){
    		echo "<p>$msg</p>";
    	}
?>
	</div>
</div>
<?php
}
?>