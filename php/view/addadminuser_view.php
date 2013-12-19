<?php function addAdminUser($address, $msg){ ?>
<div class="row">
    <div class="span7">
<?php
    if(Session::exists('home')){
?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
            <div class="text-center"><legend>New Admin</legend></div>
            <input type="hidden" id="hide" name="hide" />
            <div class="control-group">
                <label for="email" class="control-label">Email:</label>
                <div class="controls">
                    <input type="email" name="email" id="email" value="<?php echo trim(Input::get('email')); ?>" autocomplete="off" required/>
                </div>
            </div>
            <div class="control-group">
                <label for="fname" class="control-label">First Name:</label>
                <div class="controls">
                    <input type="text" name="fname" id="fname" value="<?php echo trim (Input::get('fname')); ?>" required/>
                </div>
            </div>
            <div class="control-group">
                <label for="lname" class="control-label">Last Name:</label>
                <div class="controls">
                    <input type="text" name="lname" id="lname" value="<?php echo trim (Input::get('lname')); ?>" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="sex">Sex:</label>
                <div class="controls">
                    <select name='sex' class="input-medium">
                        <option value='M'>Male</option>
                        <option value='F'>Female</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="contact_no">Contact Number:</label>
                <div class="controls">
                    <input type="text" name="contact_no" id="contact_no" value="<?php echo trim (Input::get('contact_no')); ?>" placeholder="Office, Mobile" required/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="city">City:</label>
                <div class="controls">
                    <select name='city' class="input-medium">
                        <?php
                            $city = array();
                            for($i = 0; $i < count($address); $i++){
                                if(!in_array($address[$i]->city, $city)){
                                    echo'<option>'. $address[$i]->city .'</option>';
                                    array_push($city, $address[$i]->city);
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="district">District:</label>
                <div class="controls">
                    <select name='district' class="input-medium">
                        <?php
                            $district = array();
                            for($i = 0; $i < count($address); $i++){
                                if(!in_array($address[$i]->district, $district)){
                                    echo'<option>'. $address[$i]->district .'</option>';
                                    array_push($district, $address[$i]->district);
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="country">Country:</label>
                <div class="controls">
                    <select name='country' class="input-medium">
                        <?php
                            $country = array();
                            for($i = 0; $i < count($address); $i++){
                                if(!in_array($address[$i]->country, $country)){
                                    echo'<option>'. $address[$i]->country .'</option>';
                                    array_push($country, $address[$i]->country);
                                }
                            }
                        ?>
                    </select>
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
<?php   if(!empty($msg)){   ?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php
    }
}
?>