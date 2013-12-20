<?php
include '../../init.php';

$msg = '';
$address = Address::getAddressInstance();
if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
         $validate = Validate::getValidateInstance();
         $validation = $validate->check($_POST, array(
            'fname' => array(
               'required' => true,
               'min' => 5
            ),
            'lname' => array(
               'required' => true,
               'min' => 5
            ),
            'email' => array(
               'required' => true,
               'email' => true
            ),
            'contact_no' => array(
               'required' => true,
               'min' => 9,
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
            $user = new User();
            $salt = Hash::salt(32);
            $email = Input::get('email');
            $username = explode('@', $email);
            
            try{
               $user->create(array(
                  'user_id' => RandomCode::randCode(18),
                  'username' => $username[0],
                  'first_name' => Input::get('fname'),
                  'last_name' => Input::get('lname'),
                  'password' => Hash::make($username[0], $salt),
                  'salt' => $salt,
                  'gender' => 'M',
                  'contact_no' => Input::get('contact_no'),
                  'address' => $address->data()->address_id,
                  'email' => $email,
                  'join_date' => date('Y-m-d H:i:s'),
                  'company' => 'sheo8IQ1QsvZsefi9C',
                  'groups' => 2
               ));
               
               Session::flash('home', 'New admin has been registered!');
            }catch (PDOException $e){
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
    addAdminUser($address->data(), $msg); //displaying add category form
}
ramrodeal_footer(); //Displaying footer of html
?>