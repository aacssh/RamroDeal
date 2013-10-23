<?php function addCompany(){ ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
       <div class="text-center"><legend>Deal Category</legend></div>
       <div class="row">
           <div class="span6">
                <div class="control-group">
                   <label class="control-label" for="type">Type:</label>
                   <div class="controls">
                       <input type="text" name="type" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="name">Name:</label>
                   <div class="controls">
                       <input type="text" name="name" placeholder="Name" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="email">Email:</label>
                   <div class="controls">
                       <input type="email" name="email" placeholder="something@example.com" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="phnoeno">Phone no:</label>
                   <div class="controls">
                       <input type="number" name="phoneno" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="mobileno">Mobile no:</label>
                   <div class="controls">
                       <input type="number" name="mobileno" required/>
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