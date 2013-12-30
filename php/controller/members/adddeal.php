<?php
include '../../init.php';

if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
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
            echo 'passed';
            echo 'passed';
            echo 'passed';
            echo 'passed';
            echo 'passed';
            echo 'passed';
            echo 'passed';
            echo 'passed';
            
            /*
            $company = Company::getCompanyInstance();
            $user = new User();
            $salt = Hash::salt(32);
            $email = Input::get('email');
            $username = explode('@', $email);
            $company_id = RandomCode::randCode(18);
            $address_id = $address->data()->address_id;
            $db = Database::getDBInstance();
            
            try{
               $db->beginTransaction();
               $company->create(array(
                  'company_id' => $company_id,
                  'name' => Input::get('name'),
                  'office_no' => Input::get('phoneno'),
                  'mobile_no' => Input::get('mobileno'),
                  'join_date' => date('Y-m-d H:i:s'),
                  'address' => $address_id,
                  'email' => $email,
                  'total_users' => 3
               ));
               
               $user->create(array(
                  'user_id' => RandomCode::randCode(18),
                  'username' => $username[0],
                  'first_name' => $username[0],
                  'last_name' => $username[0],
                  'password' => Hash::make(Input::get('password'), $salt),
                  'salt' => $salt,
                  'gender' => 'M',
                  'contact_no' => Input::get('phoneno'),
                  'address' => $address_id,
                  'email' => $email,
                  'join_date' => date('Y-m-d H:i:s'),
                  'company' => $company_id,
                  'groups' => 4
               ));
         
               $db->endTransaction();
               Session::flash('home', 'New company has been registered!');
            }catch (PDOException $e){
               $db->cancelTransaction();
               die($e->getMessage());
            }
            */
         } else{
            foreach($validation->errors() as $error){
               $msg = (string)$error.'<br />';
            }
         }
      }
   } else{
      die();
   }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
adddeal(Category::getCategoryInstance()->getCategory()->data()); //displaying add category form
ramrodeal_footer(); //Displaying footer of html
?>