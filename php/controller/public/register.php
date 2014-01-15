<?php
include '../../init.php';

$msg = '';
$address = Address::getAddressInstance();

if(Input::exists()){
    if(Input::get('hide') === ''){
        if(Token::check(Input::get('token'))){
            $validate = Validate::getValidateInstance();
            $validation = $validate->check($_POST, array(
                'email' => array(
                    'required' => true,
                    'email' => true
                ),
                'password' => array(
                    'required' => true,
                    'min' => 5
                ),
                'confirmpassword' => array(
                    'required' => true,
                    'matches' => 'password'
                ),
                'fname' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50
                ),
                'lname' => array(
                    'required' => true,
                    'min' => 3,
                    'max' => 50
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
                $password = Input::get('password');
    
                try{
                    $user->create(array(
                        'user_id' => RandomCode::randCode(18),
                        'username' => $username[0],
                        'first_name' => Input::get('fname'),
                        'last_name' => Input::get('lname'),
                        'password' => Hash::make($password, $salt),
                        'salt' => $salt,
                        'gender' => Input::get('sex'),
                        'contact_no' => Input::get('contact_no'),
                        'address' => $address->data()->address_id,
                        'email' => $email,
                        'join_date' => date('Y-m-d H:i:s'),
                        'company' => 'jfhK8KSn38kfuwKEj',
                        'groups' => 3
                    ));
                    if(welcomeMail($email, $password, Input::get('fname').' '.Input::get('lname'))){
                        Session::flash('home', 'Welcome to RamroDeal family. You have been registered and can log in!');
                    }
                    Redirect::to('index.php');
                }catch(Exception $e){
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

if($address->getAddress('*')){
    ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
    nav($categorylist->data());  //Displaying navigation part of html
    register_form($address->data(), $msg);   //Displaying login form
    ramrodeal_footer(); //Displaying footer of html
}
?>