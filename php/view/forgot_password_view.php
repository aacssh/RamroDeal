<?php
function forgot_password_form($msg){
    echo '<div class="container">';
?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <input type="hidden" id="hide" name="hide" /><br />
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2">
                <div class='alert alert-info'>
                    <span class="form-signin-heading text-center"><legend>New password will sent to your email.</legend></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-2 col-sm-6 col-sm-offset-2">
                <div class="form-group">
                    <label for="email" class="col-sm-3 col-xs-3 control-label">Email:</label>
                    <div class="col-sm-6 col-xs-6">
                      <input type="text" name="email" id="email" class="form-control" placeholder="Your email" required autofocus/>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                    <button type="submit" name="send" id="send" class="col-sm-3 col-xs-3 btn btn-large btn-primary input-large"/>Send</button>
                </div>
            </div>        
        </div>
    </form>
</div>
<hr />
<?php 
    if(Session::exists('home')){ ?>
        <div class='alert alert-success'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php
    }
    if(!empty($msg)){ ?>
        <div class='alert alert-danger'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php 
    }
}
?>