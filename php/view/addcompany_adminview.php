<?php function addCompany($address, $msg){ ?>
<div class="row">
    <div class="span7">
<?php if(Session::exists('home')){ ?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
            <input type="hidden" id="hide" name="hide" />
            <div class="text-center"><legend>New Company</legend></div>
            <div class="row">
               <div class="span6">
                   <div class="control-group">
                       <label class="control-label" for="name">Name:</label>
                       <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                           <input type="text" name="name" placeholder="Name" required/>
                        </div>
                       </div>
                   </div>
                   <div class="control-group">
                        <label for="password" class="control-label">Password:</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="password" name="password" id="password" required/>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="confirmpassword" class="control-label">Confirm Password:</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="password" name="confirmpassword" id="confirmpassword" required/>
                            </div>
                        </div>
                    </div>
                   <div class="control-group">
                       <label class="control-label" for="email">Email:</label>
                       <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="email" name="email" placeholder="something@example.com" required/>
                            </div>
                       </div>
                   </div>
                   <div class="control-group">
                       <label class="control-label" for="phnoeno">Phone no:</label>
                       <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="number" name="phoneno" required/>
                            </div>
                       </div>
                   </div>
                   <div class="control-group">
                       <label class="control-label" for="mobileno">Mobile no:</label>
                       <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="number" name="mobileno" required/>
                            </div>
                       </div>
                   </div>
                   <div class="control-group">
                       <label class="control-label" for="city">City:</label>
                       <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
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
                   </div>
                   <div class="control-group">
                       <label class="control-label" for="state">State/District:</label>
                       <div class="controls">
                             <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
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
                   </div>
                   <div class="control-group">
                       <label class="control-label" for="country">Country:</label>
                       <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
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
<?php
    if(!empty($msg)){
?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php
    }
?>
    </div>
</div>
<?php } ?>