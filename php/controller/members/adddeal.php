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
               'org_price_dollar' => array(
                  'required' => true,
                  'min' => 1
               ),
               'off_price_dollar' => array(
                  'required' => true,
                  'min' => 1
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
              $cover_image = Input::get('cover_image');
              $first_image = Input::get('first_image');
              $second_image = Input::get('second_image');

               try{
                   $db->beginTransaction();
                   $result = $img->add(array(
                       'cover_image' => $cover_image['name'],
                       'image1' => $first_image['name'],
                       'image2' => $second_image['name']
                   ));
                   if($result){
                       $img_id = $img->getSingleId(array(
                          'where_clause' => array(
                            'cover_image', '=', $cover_image['name']
                          )
                        ));
                       $deal_id = RandomCode::randCode(18);
                       $category_id = Category::getCategoryInstance()->getSingleId(array(
                          'where_clause' => array(
                              'name', '=', Input::get('category_name')
                          )
                        ));
                       $deal = Deal::getDealInstance()->add(
                           $deal_id,
                           Input::get('name'),
                           Input::get('org_price'),
                           Input::get('off_price'),
                           Input::get('org_price_dollar'),
                           Input::get('off_price_dollar'),
                           Input::get('s_date'),
                           Input::get('e_date'),
                           Input::get('min_people'),
                           Input::get('max_people'),
                           Input::get('coupon_valid_from'),
                           Input::get('coupon_valid_till'),
                           Input::get('desc'),
                           $user->data()->company,
                           $category_id->data()->category_id,
                           $img_id->data()->image_id
                       );
                       if(!$deal){
                          echo 'Unable to add deal. Please try again';
                       }
                       
                      $db->endTransaction();
                       Session::flash('home', 'New deal has been added');
                       Redirect::to('members/adddeal.php');
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