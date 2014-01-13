<?php
require_once '../../init.php';
$user = new User();

if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}

if (Input::get('company_id')){
    $user->getUsers('*', array('company', '=', Input::get('company_id')));
}
$msg ='';
$address = Address::getAddressInstance();
if(Input::exists()){
    if(Input::get('hide') === ''){
        $validate = Validate::getValidateInstance();
        if(Input::get('submit') == 'emailpass'){
            if(Token::check(Input::get('token'))){
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
                    }
                }else{
                    foreach($validation->errors() as $error){
                        $msg .= $error.'<br />';
                    }
                }
            } else{
                Session::flash('home', 'Token mismatch');
            }
        }
        elseif(Input::get('submit') == 'pdetails'){
            $validation = $validate->check($_POST, array(
                'fname' => array(
                    'required' => true,
                    'min' => 3
                ),
                'lname' => array(
                    'required' => true,
                    'min' => 3
                ),
                'contact_no' => array(
                    'required' => true
                )
            ));
            
            if($validation->passed()){
               $user->update(array(
                        'first_name' => Input::get('fname'),
                        'last_name' => Input::get('lname'),
                        'contact_no' => Input::get('contact_no'),
                        'gender' => Input::get('sex') 
                    ));
                    Session::flash('home', 'Your details have been updated');
            }else{
                foreach($validation->errors() as $error){
                    $msg .= $error.'<br />';
                }
            }
        }
        elseif(Input::get('submit') == 'address'){
            $address = Address::getAddressInstance();
            $validation = $validate->check($_POST, array(
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
               $user->update(array(
                    'address' => $address->data()->address_id
                ));
                Session::flash('home', 'Your details have been updated');
            }else{
                foreach($validation->errors() as $error){
                    $msg .= $error.'<br />';
                }
            }
        }
    } else{
        die();
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav($categorylist->data());  //Displaying navigation part of html
$address->getAddress('*');
if(is_array($user->data())){
    foreach($user->data() as $client){
        update($address->data(), $client, $msg);
    }
} else{
    update($address->data(), $user->data(), $msg);
}
ramrodeal_footer(); //Displaying footer of html
?>