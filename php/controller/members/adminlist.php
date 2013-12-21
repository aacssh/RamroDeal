<?php
include '../../init.php';

$admin = new User();
$admin->getUsers('user_id, first_name, last_name', array('groups', '=', 2));
$admins = $admin->data();

if(Input::exists()){
    if(Input::get('delete') != ''){
        try{
            $admin->delete(array('user_id', '=', $admins[0]->user_id));
            Session::flash('home', 'Admin has been deleted!');
        } catch(Exception $e){
            die($e->getMessage());
        }
    } elseif(Input::get('change_pw') != ''){
        Redirect::to('members/update.php', 'user_id='.$admins[0]->user_id);
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
adminList($admin->data());
ramrodeal_footer(); //Displaying footer of html
?>