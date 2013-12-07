<?php
include '../init.php';

$logout = new User();
$logout->logout();

//Redirect to the index page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php ';
header('Location: ' . $home_url);
?>