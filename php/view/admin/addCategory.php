<?php function addCategory(){ ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
       <div class="text-center"><legend>Deal Category</legend></div>
       <div class="row">
           <div class="span6">
               <div class="control-group">
                   <label class="control-label" for="name">Name:</label>
                   <div class="controls">
                       <input type="text" name="name" placeholder="Name" required/>
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