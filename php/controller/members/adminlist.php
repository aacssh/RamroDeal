<?php
include '../../init.php';

$admin = new User();
$admin->getUsers('user_id, first_name, last_name', array(
    'where_clause' => array(
        'groups', '=', 2
    )
));
$admins = $admin->data();

if(Input::exists()){
    echo Input::get('lname');
    if(Input::get('delete') != ''){
        try{
            $admin->delete(array(
                'where_clause' => array(
                    array('first_name', '=', Input::get('fname')),
                    array('last_name', '=', Input::get('lname'))
                )
            ));
            Session::flash('home', Input::get('fname').' '.Input::get('lname').' admin has been deleted!');
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