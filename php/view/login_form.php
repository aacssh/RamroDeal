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
                    <label class="control-label" for="pw">Password:</label>
                    <div class="controls">
                        <input type="password" id="pw" name = "pw" placeholder="Password" required />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" id="submit" name="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>