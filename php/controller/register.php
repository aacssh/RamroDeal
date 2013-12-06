<?php
include '../init.php';

$msg = '';
if(Input::exists()){
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
            $user = User::getUserInstance();
            $salt = Hash::salt(32);
            echo '<br>'.$salt.'<br>'.Hash::make(Input::get('password'), $salt);

            try{
                $user->create(array(
                    'user_id' => RandomCode::randCode(18),
                    'password' => Hash::make(Input::get('password'), $salt),
                    'salt' => $salt,
                    'first_name' => Input::get('fname'),
                    'last_name' => Input::get('lname'),
                    'gender' => Input::get('sex'),
                    'contact_no' => Input::get('contact_no'),
                    'address' => Address::getAddressInstance()->data()->address_id,
                    'email' => Input::get('email'),
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 1
                ));
                Session::flash('home', 'You have been registered and can log in!');
                Redirect::to(404);
            }catch(Exception $e){
                die($e->getMessage());
            }
        } else{
            foreach($validation->errors() as $error){
                echo $error.'<br />';
            }
        }
    }
}
$address = Address::getAddressInstance();

if($address->getAddress()){
    ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
    nav();  //Displaying navigation part of html
    register_form($address->data(), $msg);   //Displaying login form
    ramrodeal_footer(); //Displaying footer of html
}

?>