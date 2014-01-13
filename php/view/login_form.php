<?php
function login_form($msg){
?>
<div class="container">
    <form class="form-signin" method="post" action="" role="form">
        <h2 class="form-signin-heading">Sign in<br /> <small>[ Not a member? <a href="register.php">Sign up</a> ]</small></h2>
        <input type="hidden" id="hide" name="hide" />
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" id="password" name = "password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" name="remember" id="remember" autocomplete="off"> Remember me
        </label>
        <p><a href="forgotpassword.php">Forgot Password?</a></p>
        <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>" />
        <button type="submit" id="submit" name="submit"  class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
<?php
    if(!empty($msg)){
?>
        <div class="alert alert-danger">
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php
    }
?>
</div>
<?php } ?>