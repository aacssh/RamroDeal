<?php function addCompany($address, $msg = null){ ?>
<div class="row">
<?php if(Session::exists('home')){ ?>
        <div class='alert alert-success'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php }
      if(!empty($msg)){
?>
        <div class='alert alert-danger'>
          <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php
      } 
?>   
      <form class="form-horizintal" method="post" action="" role="form">
        <div class="row">
            <div class="text-center"><legend>New Company</legend></div>
            <input type="hidden" id="hide" name="hide" />
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name:</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?php echo trim (Input::get('name')); ?>" required autofocus/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-9">
                      <input type="email" id="email" name="email" class="form-control" value="<?php echo trim (Input::get('email')); ?>" placeholder="Email address" required>
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
                  <label for="phoneno" class="col-sm-3 control-label">Phone no:</label>
                  <div class="col-sm-9">
                    <input type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo trim (Input::get('phoneno')); ?>" placeholder="Contat No." required/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobileno" class="col-sm-3 control-label">Mobile no:</label>
                  <div class="col-sm-9">
                    <input type="text" name="mobileno" id="mobileno" class="form-control" value="<?php echo trim (Input::get('mobileno')); ?>" placeholder="Mobile No." required/>
                  </div>
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
        <br />
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="form-actions">
              <button type="submit" id="submit" name="submit"  class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
            </div>
          </div>
        </div>
    </form>
    </div>
</div>
<?php } ?>