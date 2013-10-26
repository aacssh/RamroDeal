<?php function signUp(){ ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
       <div class="text-center"><legend>Sign Up</legend></div>
       <div class="row">
           <div class="span6">
                <input type="hidden" name="type" value="customer"/>
                <div class="control-group">
                   <label class="control-label" for="fname">First Name:</label>
                   <div class="controls">
                       <input type="text" name="fname" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="lname">Last Name:</label>
                   <div class="controls">
                       <input type="text" name="lname" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="sex">Sex:</label>
                   <div class="controls">
                       <input type="text" name="sex" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="email">Email:</label>
                   <div class="controls">
                       <input type="email" name="email" placeholder="something@example.com" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="phnoeno">Contact no:</label>
                   <div class="controls">
                       <input type="number" name="phoneno" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="city">City:</label>
                   <div class="controls">
                       <input type="text" name="city" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="state">State/District:</label>
                   <div class="controls">
                       <input type="text" name="state" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="country">Country:</label>
                   <div class="controls">
                       <input type="text" name="country" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="zip">Zip:</label>
                   <div class="controls">
                       <input type="number" name="zip" required/>
                   </div>
               </div>
               <div class="control-group">
                   <div class="controls">
                       <button type="submit" name="submit" id="submit" class="btn btn-large btn-primary input-large"/>Submit</button>
                   </div>	
               </div>
           </div>	
       </div>
    </form>
<?php } ?>