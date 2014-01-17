<?php
function checkCoupon($deals = null, $msg){
    if(Session::exists('home')){ ?>
        <div class='alert alert-success'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-signin">
    <input type="hidden" id="hide" name="hide" />
    <h2 class="form-signin-heading">Coupon</h2>
    <input type="text" name="coupon_no" id="coupon_no" class="form-control fname" placeholder="Coupon No" required autofocus/>
    <select name='deal_name' class="form-control">
        <?php
            if(!empty($deals)){
                foreach($deals as $deal_name){
                    echo "<option value='$deal_name->name'>". $deal_name->name .'</option>';
                }
            }else{
                echo "<option>No active Deals</option>";
            }
        ?>
    </select>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
    <button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block"/>Submit</button>
</form>
<?php if(!empty($msg)){        
        if($msg === 'true'){
?>
            <div class='alert alert-success'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo 'Coupon Found'; ?></h1>
            </div>
            <form action='' method='post' class="form-signin">
                <input type="hidden" id="hide" name="hide" />
                <button type="submit" name="confirm" id="confirm" value='confirm' class="btn btn-lg btn-primary btn-block"/>Use Coupon</button>
            </form>
<?php
        } else{
?>
            <div class='alert alert-danger'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
            </div>
<?php
        }
	}
}
?>