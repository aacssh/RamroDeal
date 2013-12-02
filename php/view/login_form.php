<?php
    function login_form(){
?>
<div class="row">
        <div class="span7">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <legend class="control-group text-center">Login:</legend>
                <div class="control-group">
                    <label class="control-label" for="email">Email:</label>
                    <div class="controls">
                        <input type="email" id="email" name="email" placeholder="email" required>
                    </div>	
                </div>
        
                <div class="control-group">
                    <label class="control-label" for="password">Password:</label>
                    <div class="controls">
                        <input type="password" id="password" name = "password" placeholder="Password" required />
                    </div>
                </div>
                
                 <div class="control-group">
                    <label class="control-label" for="remember"></label>
                    <div class="controls">
                        <input type="checkbox" name="remember" id="remember" autocomplete="off" />Remember me
                    </div>
                </div>
                <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>" />
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" id="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>