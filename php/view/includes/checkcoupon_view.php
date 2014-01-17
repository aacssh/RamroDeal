<?php
function checkCoupon($deals){
	echo '<pre>'.print_r($deals,true).'</pre>';
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <input type="hidden" id="hide" name="hide" />
        <h2 class="form-signin-heading text-center"><legend>Coupon</legend></h2>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="coupon_no" class="col-sm-3 control-label">Coupon:</label>
                    <div class="col-sm-9">
                      <input type="text" name="coupon_no" id="coupon_no" class="form-control fname" placeholder="Coupon No" required autofocus/>
                    </div>
                  </div>
              	<div class="form-group">
                    <label for="deal_name" class="col-sm-3 control-label">Deal Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="deal_name" id="deal_name" class="form-control lname" placeholder="Deal Name" required />
                    </div>
             	 </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <button type="submit" name="submit" id="submit" class="col-sm-3 btn btn-large btn-primary input-large"/>Submit</button>
            </div>
        </div>
    </form>
<?php
    if(Session::exists('home')){ ?>
        <div class='alert alert-success'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php 
	}
}
?>