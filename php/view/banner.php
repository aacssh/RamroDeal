<?php
    function banner(){
?>
<section class="jumbotron">
	<div class="row">
	<div class="col-lg-3 col-sm-4">
    	<img src = "<?php echo BASE_URL; ?>bootstrap/img/greatdealhere.jpg" alt="" class="pull-left img-responsive img-rounded" />
    </div>
   	<div class="col-lg-9 col-sm-8">
	    <h1>Welcome to RamroDeal</h1>
	    <p class="lead">Quality Deal. Great Price</p>
	    <p>
            <a class="btn btn-lg btn-success" href="<?php echo BASE_URL; ?>php/controller/public/login.php" role="button">Sign In</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-lg btn-success" href="<?php echo BASE_URL; ?>php/controller/public/register.php" role="button">Sign Up</a>
        </p>
    </div>
    </div>
</section>
<?php } ?>