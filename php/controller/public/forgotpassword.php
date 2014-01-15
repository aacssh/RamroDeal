<?php
include '../../init.php';

$msg = '';
if(Input::exists()){
    if(Input::get('hide') === ''){
        if(Token::check(Input::get('token'))){
            $validate = Validate::getValidateInstance();
            $validation = $validate->check($_POST, array(
                'email' => array(
                    'required' => true,
                )
            ));
            
            if($validation->passed()){
                $user = new User();
                $email = Input::get('email');
                $checkEmail = $user->getUsers('email', array(
                    'where_clause' => array(
                        'email', '=', $email
                    )
                ));

                if($checkEmail){
                    $getUser = $user->find($email);
                    if($getUser){
                        $salt = Hash::salt(32);
                        $password = RandomCode::randCode(10);
            
                        try{
                            $user->update(array(
                                'password' => Hash::make($password, $salt),
                                'salt' => $salt), 
                                $user->data()->user_id
                            );
                            
                            if(forgotPassword($email, $password)){
                                Session::flash('home', 'Password has been changed. Check your email');
                            }else{
                                Session::flash('home', 'Password has been changed but, mail couldn\'t be sent. \n Please try again');
                            }
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                    }
                }
                else{
                    $msg = 'Email you given is not registered yet';
                }
            } else{
                foreach($validation->errors() as $error){
                    $msg = $error.'<br />';
                }
            }
        }
    }else{
        die();
    }
}

ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav($categorylist->data());  //Displaying navigation part of html
forgot_password_form($msg);   //Displaying login form
ramrodeal_footer(); //Displaying footer of html
?>