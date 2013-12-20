<?php
include '../../init.php';

$msg = '';
$address = Address::getAddressInstance();
if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
         $validate = Validate::getValidateInstance();
         $validation = $validate->check($_POST, array(
            'name' => array(
               'required' => true,
               'min' => 5
            ),
            'password' => array(
               'required' => true,
               'min' => 5
            ),
            'confirmpassword' => array(
               'required' => true,
               'matches' => 'password'
            ),
            'email' => array(
               'required' => true,
               'email' => true
            ),
            'phoneno' => array(
               'required' => true,
               'min' => 9,
               'max' => 10
            ),
            'mobileno' => array(
              'required' => true,
              'min' => 10,
              'max' => 10
            ),
            'city' => array(
              'required' => true 
            ),
            'district' => array(
                'required' => true
            ),
            'country' => array(
                'required' => true
            )
         ));
   
         if($validation->passed()){
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
                  'groups' => 3
               ));
         
               $db->endTransaction();
               Session::flash('home', 'New company has been registered!');
            }catch (PDOException $e){
               $db->cancelTransaction();
               die($e->getMessage());
            }
         } else{
            foreach($validation->errors() as $error){
               $msg = $error.'<br />';
            }
         }
      }
   } else{
      die();
   }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html
if($address->getAddress('*')){
   addCompany($address->data(), $msg);   //displaying add category form
}
ramrodeal_footer(); //Displaying footer of html
?>