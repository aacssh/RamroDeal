<?php
require_once 'init_index.php';
$categorylist = Category::getCategoryInstance()->getCategory();
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$home = 'http://localhost/RamroDeal-Boot3/php/controller/public';
/*
if(!Cookie::exists(Config::get('remember/cookie_name')) && ($url === $home)){
    Redirect::to('index.php');
}
*/
?>