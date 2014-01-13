<?php function update($address, $user, $msg) {
?>
<div class="container">
<?php
    if(Session::exists('home')){
?>
            <div class='alert alert-danger'>
                <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
            </div>
<?php }elseif(!empty($msg)){ ?>
        <div class='alert alert-danger'>
            <span class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></span>
        </div>
<?php } ?>
    <h2 class="text-center">Update</h2><hr />

    <section class="row">
        <article class= "col-lg-12 col-sm-12">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#emailpass" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                <span class="glyphicon glyphicon-book"></span> [ Email & Password ]
                            </a>
                        </h4>
                    </div>
                    <div id="emailpass" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form class="form-signin" name='emailpass' method="post" action="" role="form">
                                <h3 class="form-signin-heading">[ Email & Password ]</h2>
                                <input type="hidden" id="hide" name="hide" />
                                <input type="text" name="username" id="Username" class="form-control" value="<?php echo $user->username; ?>" required/><br />
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user->email; ?>" placeholder="Email address" required /><br />
                                <input type="password" id="password_current" name="password_current" placeholder="Current Password" class="form-control" required><br />
                                <input type="password" id="password_new" name = "password_new" placeholder="New Password" class="form-control" required /><br />
                                <input type="password" name="password_new_again" id="password_new_again" placeholder="Confirm New Password" class="form-control" required /><br />
                                <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>" />
                                <button type="submit" id="submit" name="submit"  value = "emailpass" class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="#pdetail" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                <span class="glyphicon glyphicon-user"></span> [ Personal Details ]
                            </a>
                        </h4>
                    </div>
                    <div id="pdetail" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="form-signin" name="pdetails" method="post" action="" role="form">
                                <h3 class="form-signin-heading">[ Personal Details ]</h3>
                                    <input type="hidden" id="hide" name="hide" />
                                    <div class="form-group">
                                        <label for="fname" class="col-sm-5 control-label">First Name:</label>
                                        <div class="col-sm-7">
                                          <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" value="<?php echo $user->first_name; ?>" required autofocus/>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="lname" class="col-sm-5 control-label">Last Name:</label>
                                        <div class="col-sm-7   ">
                                          <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name"  value="<?php echo $user->last_name; ?>" required />
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <label for="contact_no" class="col-sm-5 control-label">Contact No:</label>
                                        <div class="col-sm-7">
                                          <input type="text" name="contact_no" id="contact_no" class="form-control" value="<?php echo $user->contact_no; ?>" placeholder="Contat No." required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sex" class="col-sm-5 control-label">Sex:</label>
                                        <div class="col-sm-7">
                                            <select name='sex' class="form-control">
                                                <option value='M'>Male</option>
                                                <option value='F'>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                <button type="submit" id="submit" name="submit" value = "pdetails" class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a href="#address" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                <span class="glyphicon glyphicon-globe"></span> [ Address ]
                            </a>
                        </h4>
                    </div>
                    <div id="address" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="form-signin" name="address" method="post" action="" role="form">
                                <h3 class="form-signin-heading">[ Address ]</h3>
                                <input type="hidden" id="hide" name="hide" />
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
                                <button type="submit" id="submit" name="submit" value = "address" class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </article>
    </section>
</div>
<?php
}
?>