<?php
include '../../init.php';

$admin = new User();
$admin->hasPermission();
$admin->find('first_name, last_name', array('groups', '=', 2));
echo '<pre>'.print_r($admin->data(), true).'</pre>';
$admins = array();
foreach($admin->data() as $data){
    foreach($data as $name){
        array_push($admins, $name);
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
adminList($admins);
ramrodeal_footer(); //Displaying footer of html
?>