<?php
include '../../init.php';

$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
$admin = new User();
$admin->getUsers('user_id, first_name, last_name, email', array(
    'where_clause' => array(
        'groups', '=', 2
    )
));

if(Input::exists()){
    if(Input::get('delete') != ''){
        try{
            $admin->delete(array(
                'where_clause' => array(
                    array('first_name', '=', Input::get('fname')),
                    array('last_name', '=', Input::get('lname')),
                    array('groups', '=', 2)
                )
            ));

            if(deleteMail(Input::get('email'), Input::get('fname').' '.Input::get('lname'))){
                Session::flash('home', Input::get('fname').' '.Input::get('lname').' admin has been deleted!');
            }else{
                Session::flash('home', 'New company has been added.');
            }

            Redirect::to('members/adminlist.php');
        } catch(Exception $e){
            die($e->getMessage());
        }
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
adminList($admin->data());
ramrodeal_footer(); //Displaying footer of html
?>