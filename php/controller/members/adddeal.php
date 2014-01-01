<?php
include '../../init.php';

$msg = '';
if(Input::exists()){
    if(Input::get('hide') === ''){
        if(Token::check(Input::get('token'))){
            $user = new User();
            $validate = Validate::getValidateInstance();
            $validation = $validate->check($_POST, array(
               'name' => array(
                  'required' => true,
                  'min' => 5
               ),
               'org_price' => array(
                  'required' => true,
                  'min' => 2
               ),
               'off_price' => array(
                  'required' => true,
                  'min' => 2
               ),
               'min_people' => array(
                  'required' => true,
                  'min' => 1
               ),
               'max_people' => array(
                  'required' => true,
                  'min' => 1
               ),
               's_date' => array(
                 'required' => true
               ),
               'e_date' => array(
                 'required' => true 
               ),
               'coupon_valid_from' => array(
                   'required' => true
               ),
               'coupon_valid_till' => array(
                   'required' => true
               ),
               'cover_image' => array(
                   'required' => true
               ),
               'first_image' => array(
                   'required' => true
               ),
               'second_image' => array(
                   'required' => true
               )
            ));
      
           if($validation->passed()){
               $img = Image::getImageInstance();
               $db = Database::getDBInstance();

               try{
                   $db->beginTransaction();
                   $result = $img->add(array(
                       'cover_image' => Input::get('cover_image'),
                       'image1' => Input::get('first_image'),
                       'image2' => Input::get('second_image')
                   ));
                   if($result){
                       $img_id = $img->getSingleId();
                       $deal_id = RandomCode::getRandomCode()->randCode(18);
                       $category_id = Company::getCompanyInstance()->getId(array('name', '=', Input::get('category_name')));
                       
                       $deal = Deal::getDealInstance()->add(array(
                           'deal_id' => $deal_id,
                           'name' => Input::get('name'),
                           'actual_price' => Input::get('org_price'),
                           'offered_price' => Input::get('off_price'),
                           'start_date' => Input::get('s_date'),
                           'end_date' => Input::get('e_date'),
                           'minimum_purchase_requirement' => Input::get('min_people'),
                           'maximum_purchase_requirement' => Input::get('max_people'),
                           'coupon_start_date' => Input::get('coupon_valid_from'),
                           'coupon_end_date' => Input::get('coupon_valid_till'),
                           'company_id' => $user->data()->company,
                           'category_id' => $category_id,
                           'image_id' => $img_id
                       ));
                       $db->endTransaction();
                       Session::flash('home', 'New deal has been added');
                    } else{
                        Session::flash('home', 'Image couldn\'t be uploaded.');
                    }
               }catch (PDOException $e){
                    $db->cancelTransaction();
                    die($e->getMessage());
               }
           } else{
                foreach($validation->errors() as $error){
                    $msg .= $error.'<br />';
                }
           }
       }
    } else{
        die();
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
adddeal(Category::getCategoryInstance()->getCategory()->data(), $msg); //displaying add category form
ramrodeal_footer(); //Displaying footer of html
?>