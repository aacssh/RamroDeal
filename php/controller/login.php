<?php
include '../init.php';

$msg = '';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = Validate::getValidateInstance();
        $validation = $validate->check($_POST, array(
            'email' => array(
                'required' => true,
            ),
            'password' => array(
                'required' => true,
                'min' => 5
            )
        ));
        
        if($validation->passed()){
            echo 'he';
            //user log in
            $user = User::getUserInstance();
            
            $remember = (Input::get('remember') === 'on') ? true : false;

            $login = $user->login(Input::get('email'), Input::get('password'), $remember);
            
            if($login){
                if($user->hasPermission('admin')){
                    Redirect::to('/admin/admin _homepage.php');
                }elseif($user->hasPermission('moderator')){
                    Redirect::to('/admin/moderator_homepage.php');
                } elseif($user->hasPermission('mer_admin')){
                    Redirect::to('/admin/merAdmin _homepage.php');
                } elseif($user->hasPermission('mer_moderator')){
                    Redirect::to('/admin/merModerator _homepage.php');
                } elseif($user->hasPermission('normal_user')){
                    Redirect::to('/admin/normalUser _homepage.php');
                }
            } else{
                $msg = 'Incorrect email or password.';
            }
        } else{
            foreach($validation->errors() as $error){
                $msg = $error.'<br />';
            }
        }
    }
}

ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");    //Displaying heading part of html

nav();  //Displaying navigation part of html

login_form($msg);   //Displaying login form

ramrodeal_footer(); //Displaying footer of html
?>