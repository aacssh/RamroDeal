<?php
session_start();

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include '../class/'.$class.'.php';
});

$logout = Log::getLogInstance();

$logout->logout();

//Redirect to the index page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php ';
header('Location: ' . $home_url);
?>