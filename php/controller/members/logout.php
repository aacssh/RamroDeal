<?php
include '../../init.php';

$logout = new User();
$logout->logout();
Redirect::to('index.php'); //Redirect to the index page
?>