<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
$user = new User();
$list = $user->getUsers('user_id,username, first_name, last_name, gender, contact_no, email, join_date', array(
        'where_clause' => array(
            'groups','=', 3
        )
));
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
customer_list($user->data());
ramrodeal_footer(); //Displaying footer of html
?>