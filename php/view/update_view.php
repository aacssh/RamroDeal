<?php
function update($user){
?>
    <div class="row">
        <div class="span7">
            <form action='' method='post' class="form-horizontal">
                <input type="hidden" id="hide" name="hide" />
                <div class="control-group">
                    <label for="username" class="control-label">Username</label>
                    <div class="controls">
                        <input type="text" name="username" id="username" value="<?php echo trim($user->data()->username); ?>" autocomplete="off" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="password_current" class="control-label">Current Password</label>
                    <div class="controls">
                        <input type="password" name="password_current" id="password_current" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="password_new" class="control-label">New Password</label>
                    <div class="controls">
                        <input type="password" name="password_new" id="password_new" />
                    </div>
                </div>
                <div class="control-group">
                    <label for="password_new_again" class="control-label">Confirm New Password</label>
                    <div class="controls">
                        <input type="password" name="password_new_again" id="password_new_again" />
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" name="register" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>