<?php
include '../../init.php';

$msg = '';
$address = Address::getAddressInstance();
if(Input::exists()){
   if(Token::check(Input::get('token'))){
      $validate = Validate::getValidateInstance();
      $validation = $validate->check($_POST, array(
         'name' => array(
            'required' => true,
            'min' => 5
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
         $salt = Hash::salt(32);
         $email = Input::get('email');
         $username = explode('@', $email);
         
         try{
            $company->create(array(
               'company_id' => RandomCode::randCode(18),
               'name' => Input::get('name'),
               'office_no' => Input::get('phoneno'),
               'mobile_no' => Input::get('mobileno'),
               'join_date' => date('Y-m-d H:i:s'),
               'address' => $address->data()->address_id,
               'email' => Input::get('email')
            ));
            Session::flash('home', 'New company has been registered!');
         }catch (Exception $e){
            die($e->getMessage());
         }
      } else{
         foreach($validation->errors() as $error){
            $msg = $error.'<br />';
         }
      }
   }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html
if($address->getAddress('*')){
   addCompany($address->data(), $msg);   //displaying add category form
}
ramrodeal_footer(); //Displaying footer of html
?>