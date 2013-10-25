<?php function addDeal($categorylist){ ?>
    <form enctype = "multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
        <div class="text-center"><legend>Sign Up</legend></div>
        <div class="row">
           <div class="span6">
                <input type="hidden" name="max_file_size" value="2097152" />
                <input type="hidden" name="type" value="customer"/>
                 <div class="control-group">
                    <label class="control-label" for="category_name">Category:</label>
                    <div class="controls">
                        <select name='category_name' class="input-medium">
                           <?php
                           foreach($categorylist as $category){
                                foreach($category as $list){
                                    echo'<option>'. $list .'</option>';
                                }
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                   <label class="control-label" for="name">Name:</label>
                   <div class="controls">
                       <input type="text" name="name" title="Deal name may contain space and string" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="org_price">Original Price:</label>
                   <div class="controls">
                       <input type="number" name="org_price" pattern="[0-9]{2,9}" title="Number Only" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="off_price">Offered Price:</label>
                   <div class="controls">
                       <input type="number" name="off_price" pattern="[0-9]{2,9}" title="Number Only" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="min_people">Minimum no. of People:</label>
                   <div class="controls">
                       <input type="number" name="min_people" pattern="[0-9]{2,9}" title="Number Only" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="max_people">Maximum no. of People:</label>
                   <div class="controls">
                       <input type="number" name="max_people" pattern="[0-9]{2,9}" title="Number Only" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="s_date">Start Date:</label>
                   <div class="controls">
                       <input type="date" name="s_date" required/>
                   </div>
               </div>
               <div class="control-group">
                   <label class="control-label" for="e_date">End Date:</label>
                   <div class="controls">
                       <input type="date" name="e_date" required/>
                   </div>
               </div>
                <div class="control-group">
                   <label class="control-label" for="coupon_valid_from">Coupon Valid From:</label>
                   <div class="controls">
                       <input type="date" name="coupon_valid_from" required/>
                   </div>
               </div>
                <div class="control-group">
                   <label class="control-label" for="coupon_valid_till">Coupon Valid Till:</label>
                   <div class="controls">
                       <input type="date" name="coupon_valid_till" required/>
                   </div>
               </div>
                <div class="control-group">
                   <label class="control-label" for="cover_image">Cover Image:</label>
                   <div class="controls">
                       <input type="file" id="cover_image" name="cover_image" required/>
                   </div>
               </div>
                <div class="control-group">
                   <label class="control-label" for="first_image">First Image:</label>
                   <div class="controls">
                       <input type="file" id="first_image" name="first_image" required/>
                   </div>
               </div>
                <div class="control-group">
                   <label class="control-label" for="second_image">Second Image:</label>
                   <div class="controls">
                       <input type="file" id="second_image" name="second_image" required/>
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