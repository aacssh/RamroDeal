<?php
include '../init.php';

$logout = User::getUserInstance();
echo 'help<br>';
$logout->logout();

//Redirect to the index page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php ';
header('Location: ' . $home_url);
?>