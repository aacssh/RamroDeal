<?php function addAdminUser($address, $msg){ ?>
<div id="container" class="container">
    <form class="form-horizintal" method="post" action="" role="form">
        <div class="row">
<?php
    if(Session::exists('home')){
?>
            <div class='alert alert-success'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
            </div>
<?php } ?>
            <h2 class="text-center">Add Admin</h2><hr />
            <input type="hidden" id="hide" name="hide" />
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="fname" class="col-sm-3 control-label">First Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo trim (Input::get('fname')); ?>" required autofocus/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lname" class="col-sm-3 control-label">Last Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"  value="<?php echo trim (Input::get('lname')); ?>" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                      <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-9">
                      <input type="password" id="password" name = "password" class="form-control" placeholder="Password" required />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="confirmpassword" class="col-sm-3 control-label">Confirm Password:</label>
                    <div class="col-sm-9">
                      <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required />
                    </div>
                  </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="contact_no" class="col-sm-3 control-label">Contact No:</label>
                    <div class="col-sm-9">
                      <input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo trim (Input::get('contact_no')); ?>" placeholder="Contat No." required/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sex" class="col-sm-3 control-label">Sex:</label>
                    <div class="col-sm-9">
                        <select name='sex' class="form-control">
                            <option value='M'>Male</option>
                            <option value='F'>Female</option>
                        </select>
                    </div>
                  <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City:</label>
                    <div class="col-sm-9">
                        <select name='city' class="form-control">
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
                        <select name='district' class="form-control">
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
                        <select name='country' class="form-control">
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
                <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>" />
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="form-actions">
                <button type="submit" id="submit" name="submit"  class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
                </div>
            </div>
        </div>
    </form>

<?php
    if(!empty($msg)){
?>
    <div class="alert alert-danger">
        <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
    </div>
</div>
<?php
    }
}
?>