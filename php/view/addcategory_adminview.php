<?php
function addCategory(){
    echo '<div class="container">';
    if(Session::exists('home')){ ?>
        <div class='alert alert-danger'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <input type="hidden" id="hide" name="hide" />
        <h2 class="form-signin-heading text-center"><legend>Category</legend></h2>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-2 col-sm-6 col-sm-offset-2">
                <div class="form-group">
                    <label for="fname" class="col-sm-3 control-label">First Name:</label>
                    <div class="col-sm-6">
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo trim (Input::get('fname')); ?>" required autofocus/>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                    <button type="submit" name="submit" id="submit" class="col-sm-3 btn btn-large btn-primary input-large"/>Submit</button>
                </div>
            </div>        
        </div>
    </form>
    <hr />
<?php } ?>

