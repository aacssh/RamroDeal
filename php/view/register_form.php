<?php
function register_form($address, $msg){
?>
<div class="container" id="sgn_up">
    <form class="form-horizintal" method="post" action="" id="signup" role="form">
        <div class="row">
            <h2 class="form-signin-heading">Sign up<br /> <small>[ Already a member? <a href="login.php">Sign in</a> ]</small></h2>
            <input type="hidden" id="hide" name="hide" />
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="fname" class="col-sm-3 control-label">First Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="fname" id="fname" class="form-control fname" placeholder="First Name" value="<?php echo trim (Input::get('fname')); ?>" required autofocus/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lname" class="col-sm-3 control-label">Last Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="lname" id="lname" class="form-control lname" placeholder="Last Name"  value="<?php echo trim (Input::get('lname')); ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                      <input type="email" id="email" name="email" class="form-control email" placeholder="Email address" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-9">
                      <input type="password" id="password" name = "password" class="form-control password" placeholder="Password" required />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="confirmpassword" class="col-sm-3 control-label">Confirm Password:</label>
                    <div class="col-sm-9">
                      <input type="password" name="confirmpassword" id="confirmpassword" class="form-control confirmpassword" placeholder="Confirm Password" required />
                    </div>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="contact_no" class="col-sm-3 control-label">Contact No:</label>
                    <div class="col-sm-9">
                      <input type="text" name="contact_no" id="contact_no" class="form-control contact_no" value="<?php echo trim (Input::get('contact_no')); ?>" placeholder="Contat No." required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sex" class="col-sm-3 control-label">Sex:</label>
                    <div class="col-sm-9">
                        <select name='sex' class="form-control sex">
                            <option value='M'>Male</option>
                            <option value='F'>Female</option>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City:</label>
                    <div class="col-sm-9">
                        <select name='city' class="form-control city">
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
                  <div class="form-group">
                    <label for="district" class="col-sm-3 control-label">District:</label>
                    <div class="col-sm-9">
                        <select name='district' class="form-control district">
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
                  <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Country:</label>
                    <div class="col-sm-9">
                        <select name='country' class="form-control country">
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
                <input type="hidden" name="token" class="token" id="token" value="<?php echo Token::generate(); ?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="form-actions">
                <button type="submit" id="submit" name="submit"  class="btn btn-lg btn-primary btn-block submit" type="submit">Sign in</button>
                </div>
            </div>
        </div>
    </form>

<?php
    if(!empty($msg)){
?>
    <div class="alert alert-danger">
        <span class='control-label text-center btn btn-large btn-block error'></span>
    </div>
</div>
<?php
    }
}
?>