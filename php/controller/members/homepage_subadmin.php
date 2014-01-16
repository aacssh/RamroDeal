<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html
totalcoupon();
ramrodeal_footer(); //Displaying footer of html
?>