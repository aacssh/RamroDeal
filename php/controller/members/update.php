<?php
require_once '../../init.php';
$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if (Input::get('company_id')){
    $user->getUsers('*', array('company', '=', Input::get('company_id')));
}

if(Input::exists()){
    if(Input::get('hide') === ''){
        if(Token::check(Input::get('token'))){
            $validate = Validate::getValidateInstance();
            $validation = $validate->check($_POST, array(
                'password_current' => array(
                    'required' => true,
                    'min' => 5
                ),
                'password_new' => array(
                    'required' => true,
                    'min' => 5
                ),
                'password_new_again' => array(
                    'required' => true,
                    'matches' => 'password_new'
                )
            ));
            
            if($validation->passed()){
                if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
                    Session::flash('home', 'Your current password is wrong');
                }else{
                    $salt = Hash::salt(32);
                    
                    $user->update(array(
                        'password' => Hash::make(Input::get('password_new'), $salt),
                        'salt' => $salt
                    ));
                    Session::flash('home', 'Your details have been updated');
                   // Redirect::to('index.php');
                }
            }else{
                foreach($validation->errors() as $error){
                    echo $error.'<br />';
                }
            }
        }
    } else{
        die();
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html

if(Session::exists('home')){
    echo '<p>'. Session::flash('home'). '</p>';
}

if(is_array($user->data())){
    foreach($user->data() as $client){
        update($client);
    }
} else{
    update($user->data());
}
ramrodeal_footer(); //Displaying footer of html
?>