<?php
    include '../../init.php';
    
    //Displaying heading part of html
    ramrodeal_header("Sign Up : RamroDeal - Great Deal, Great Price");
    
    //Displaying navigation part of html
   nav();
   
    $db = Database::getDBInstance();
   $category = Category::getCategoryInstance($db);
   $list = $category->getCategory();
   
    if (isset($_POST['submit'])){
        $filter = Validation::getValidationInstance();
        $category_name = $filter->filter($_POST['category_name']);
        $name = $filter->filter($_POST['name']);
        $org_price = $filter->filter($_POST['org_price']);
        $off_price = $filter->filter($_POST['off_price']);
        $min_people = $filter->filter($_POST['min_people']);
        $max_people = $filter->filter($_POST['max_people']);
        $s_date = $filter->filter($_POST['s_date']);
        $e_date = $filter->filter($_POST['e_date']);
        $coupon_valid_from = $filter->filter($_POST['coupon_valid_from']);
        $coupon_valid_till = $filter->filter($_POST['coupon_valid_till']);
        $cover_image = $_FILES['cover_image']['name'];
        $cover_image_type = $_FILES['cover_image']['type'];
        $cover_image_size = $_FILES['cover_image']['size'];
        $first_image = $_FILES['first_image']['name'];
        $first_image_type = $_FILES['first_image']['type'];
        $first_image_size = $_FILES['first_image']['size'];
        $second_image = $_FILES['second_image']['name'];
        $second_image_type = $_FILES['second_image']['type'];
        $second_image_size = $_FILES['second_image']['size'];
        
        if (!empty($category_name) && !empty($name) && !empty($org_price) && !empty($off_price) && !empty($min_people) && !empty($max_people) && !empty($s_date) &&
            !empty($e_date) && !empty($coupon_valid_from) && !empty($coupon_valid_till) && !empty($cover_image) && !empty($first_image) && !empty($second_image)) {
        
            if ((($cover_image_type == 'image/gif') || ($cover_image_type == 'image/jpeg') || ($cover_image_type == 'image/pjpeg')
                || (($cover_imaget_type) == 'image/png')) && ($cover_image_size > 0) && ($cover_image_size <= MAXFILESIZE) ||
                (($first_image_type == 'image/gif') || ($first_image_type == 'image/jpeg') || ($first_image_type == 'image/pjpeg')
                || (($first_imaget_type) == 'image/png')) && ($first_image_size > 0) && ($first_image_size <= MAXFILESIZE) ||
                (($second_image_type == 'image/gif') || ($second_image_type == 'image/jpeg') || ($second_image_type == 'image/pjpeg')
                || (($second_imaget_type) == 'image/png')) && ($second_image_size > 0) && ($second_image_size <= MAXFILESIZE)) {
                
                if (($_FILES['cover_image']['error'] == 0) || ($_FILES['first_image']['error'] == 0) || ($_FILES['second_image']['error'] == 0)) {
                    // Move the file to the target upload folder
                    $target1 = UPLOADPATH . $cover_image;
                    $target2 = UPLOADPATH . $first_image;
                    $target3 = UPLOADPATH . $second_image;
                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $target1) &&  move_uploaded_file($_FILES['first_image']['tmp_name'], $target2)
                        && move_uploaded_file($_FILES['second_image']['tmp_name'], $target3)) {
                        
                        $img = array(
                                     'cover_image' => $cover_image, 'first_image' => $first_image, 'second_image' => $second_image
                                     );
                        
                        try{
                            $db->beginTransaction();
                            $image = Image::getImageInstance();
                            
                            $image->setProperty($img, $db);
                            $image->addImage();
                            $img_id = $image->getImageId();
                           
                            if($img_id == 0){
                                echo 'Image id couldn\'t be found';
                            } else{
                                
                                try{
                                    $deal_id = RandomCode::getRandomCodeInstance()->randCode(18);
                                }
                                catch(Exception $e){
                                    echo $e->getMessage();
                                }
                                
                                $category->setProperty($category_name);
                                $categoryid = $category->getCategoryId();
                                
                                foreach($categoryid as $c_id){
                                    foreach($c_id as $cid){
                                        $id = $cid;
                                    }
                                }
                                
                                foreach($img_id as $i_id){
                                    foreach($i_id as $im_id){
                                        $image_id = $im_id;
                                    }
                                }

                                $args = array(
                                  'id' => $id, 'name' => $name, 'org_price' => $org_price, 'off_price' => $off_price, 'min_people' => $min_people, 'max_people' => $max_people,
                                  's_date' => $s_date, 'e_date' => $e_date, 'coupon_valid_from' => $coupon_valid_from, 'coupon_valid_till' => $coupon_valid_till,
                                  'image_id' => $image_id, 'deal_id' => $deal_id, 'merchant_id' => 'suho8IQ1QatZwtxi9C'
                                );
                            
                                try{
                                    $deal = Deal::getDealInstance();
                                    $deal->setProperty($args, $db);
                                    $add_deal = $deal->addDeal();
                                    echo $add_deal;
                                }
                                catch(Exception $e){
                                    echo $e->getMessage();
                                }
                            }
                            $db->endTransaction();
                        } catch(PDOException $e){
                            $db->cancelTransaction();
                            die($e->getMessage());
                        }
                        
                    } else{
                        echo 'Images couldn\'t be moved to images folder';
                    }
                } else{
                    echo 'Couldn\'t upload the images';
                }
            }
        } else{
            echo 'Fields can\'t be empty';
        } 
    }
   
   $db = Database::getDBInstance();
   $category = Category::getCategoryInstance($db);
   $list = $category->getCategory();
    
    //displaying add category form
    addDeal($list);
    
    //Displaying footer of html
    ramrodeal_footer();
?>