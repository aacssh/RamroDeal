<?php
session_start();

function __autoload($obj){
    $class = strtolower($obj);
    include '../class/'.$class.'.php';
}

$logout = Log::getLoginInstance();

$logout->logout();

//Redirect to the index page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php ';
header('Location: ' . $home_url);
?>