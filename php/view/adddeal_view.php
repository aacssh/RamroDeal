<?php
function addDeal($categorylist, $msg = ''){
    $i = 0;
    if(!empty($msg)){
?>
        <div class='alert alert-danger'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo $msg; ?></h1>
        </div>
<?php
    }
?>
<div class="container">
    <form class="form-horizintal" enctype = "multipart/form-data" method="post" action="" role="form">
      <div class="row">
        <div class="form-signin-heading text-center"><legend>Add Deal</legend></div>
          <input type="hidden" id="hide" name="hide" />
          <input type="hidden" name="max_file_size" value="2097152" />
          <input type="hidden" name="type" value="customer"/>
          <div class="col-lg-6 col-sm-6">
            <div class="form-group">
              <label class="col-sm-5 control-label" for="category_name">Category:</label>
              <div class="col-sm-7">
                  <select name='category_name' class="form-control">
                  <?php
                      while($i < count($categorylist) ){
                          echo'<option>'. $categorylist[$i]->name .'</option>';
                          $i++;
                      }
                  ?>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-sm-5 control-label">Name:</label>
              <div class="col-sm-7">
                <input type="text" name="name" id="name" class="form-control" title="Deal name may contain space and string" value ="<?php echo Input::get('name'); ?>" placeholder="Deal Name"  value="<?php echo trim (Input::get('lname')); ?>" required />
              </div>
            </div>
            <div class="form-group">
              <label for="org_price" class="col-sm-5 control-label">Original Price(Nrs):</label>                  
              <div class="col-sm-7">
                <input type="number" step='any' name="org_price" title="Number Only" class="form-control" value ="<?php echo Input::get('org_price'); ?>" placeholder="Nepali Rs" required>
              </div>
            </div>
            <div class="form-group">
              <label for="off_price" class="col-sm-5 control-label">Offered Price(Nrs):</label>  
              <div class="col-sm-7">
                <input type="number" step='any' name="off_price" title="Number Only" class="form-control" value ="<?php echo Input::get('off_price'); ?>" placeholder="Nepali Rs" required>
              </div>
            </div>
            <div class="form-group">
              <label for="org_price" class="col-sm-5 control-label">Original Price($):</label>                  
              <div class="col-sm-7">
                <input type="number" step='any' name="org_price_dollar" title="Number Only" class="form-control" value ="<?php echo Input::get('org_price'); ?>" placeholder="US Dollar" required>
              </div>
            </div>
            <div class="form-group">
              <label for="off_price" class="col-sm-5 control-label">Offered Price($):</label>  
              <div class="col-sm-7">
                <input type="number" step='any' name="off_price_dollar" title="Number Only" class="form-control" value ="<?php echo Input::get('off_price'); ?>" placeholder="US Dollar" required>
              </div>
            </div>
            <div class="form-group">
              <label for="min_people" class="col-sm-5 control-label">Minimum no. of People:</label>                  
              <div class="col-sm-7">
                <input type="text" name="min_people" pattern="[0-9]{2,9}" title="Number Only" class="form-control" value ="<?php echo Input::get('min_people'); ?>" placeholder="Minimum requirement" required>
              </div>
            </div>
            <div class="form-group">
              <label for="min_people" class="col-sm-5 control-label">Maxmum no. of People:</label>                  
              <div class="col-sm-7">
                <input type="text" name="max_people" pattern="[0-9]{2,9}" title="Number Only" class="form-control" value="<?php echo Input::get('max_people'); ?>" placeholder="Maximum requirement" required>
              </div>
            </div>
            <div class="form-group">
              <label for="s_date" class="col-sm-5 control-label">Start date:</label>
              <div class="col-sm-7">
                <input type="date" name="s_date" id="datepicker" class="form-control" value ="<?php echo Input::get('s_date'); ?>" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="e_date" class="col-sm-5 control-label">End date:</label>
              <div class="col-sm-7">
                <input type="date" name="e_date" id="datepicker" class="form-control" value ="<?php echo Input::get('e_date'); ?>" required/>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <div class="form-group">
              <label for="coupon_valid_from" class="col-sm-5 control-label">Coupon valid from:</label>
              <div class="col-sm-7">
                <input type="date" name="coupon_valid_from" id="datepicker" class="form-control" value ="<?php echo Input::get('coupon_valid_from'); ?>" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="coupon_valid_till" class="col-sm-5 control-label">Coupon valid till:</label>
              <div class="col-sm-7">
                <input type="date" name="coupon_valid_till" id="datepicker" class="form-control" value ="<?php echo Input::get('coupon_valid_till'); ?>" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="cover_image" class="col-sm-5 control-label">Cover image:</label>
              <div class="col-sm-7">
                <input type="file" name="cover_image" class="form-control" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="first_image" class="col-sm-5 control-label">First image:</label>
              <div class="col-sm-7">
                <input type="file" name="first_image" class="form-control" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="second_image" class="col-sm-5 control-label">Second image:</label>
              <div class="col-sm-7">
                <input type="file" name="second_image" class="form-control" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="desc" class="col-sm-5 control-label">Description:</label>                  
              <div class="col-sm-7">
                <textarea name='desc' class="form-control" rows='6' value ="<?php echo Input::get('desc'); ?>" required></textarea>
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
<?php
  }
?>