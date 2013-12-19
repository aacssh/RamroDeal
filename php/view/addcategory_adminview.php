<?php
function addCategory(){
    if(Session::exists('home')){ ?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <input type="hidden" id="hide" name="hide" />
        <div class="text-center"><legend>Deal Category</legend></div>
        <div class="row">
            <div class="span6">
                <div class="control-group">
                    <label class="control-label" for="name">Name:</label>
                    <div class="controls">
                        <input type="text" name="name" placeholder="Name" required/>
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="submit" id="submit" class="btn btn-large btn-primary input-large"/>Submit</button>
                    </div>        
                </div>
            </div>        
        </div>
    </form>
<?php } ?>

