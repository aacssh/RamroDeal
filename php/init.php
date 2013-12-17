<?php
require_once 'init_index.php';

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$home = 'http://localhost/RamroDeal/php/controller/members';
/*
if(!Cookie::exists(Config::get('remember/cookie_name')) && ($url === $home)){
    Redirect::to('index.php');
}
*/
?>