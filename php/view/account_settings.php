<?php
function account(){
?>
<div class="container">
    <form class="form-horizintal" method="post" action="" role="form">
        <div class="row">
<?php
    if(Session::exists('home')){
?>
            <div class='alert alert-danger'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
            </div>
<?php } ?>
            <h2 class="text-center">Add Admin</h2><hr />
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
    <form action="" method="post">
        <div class="field">
            <label for="name">Name</label>
            <input type="text" name="name" id="username" value="<?php echo trim($user->data()->name);?>" autocomplete="off" />
        </div>    
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
        <button type="submit" name="update">Update</button>
    </form>
    
    <div class="row">
        <div class="span7">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <legend class="control-group text-center">Account:</legend>
                <div class="control-group">
                    <label for="fname" class="control-label">First Name:</label>
                    <div class="controls">
                        <input type="text" name="fname" id="fname" value="<?php echo trim (Input::get('fname')); ?>" required/>
                    </div>
                </div>
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
<?php
}
?>