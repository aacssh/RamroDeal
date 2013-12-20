<?php
include '../../init.php';

$admin = new User();
$admin->getUsers('first_name, last_name', array('groups', '=', 2));

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
adminList($admin->data());
ramrodeal_footer(); //Displaying footer of html
?>