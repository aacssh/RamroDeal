<?php

include '../view/fns.php';

function __autoload($obj){
    $class = strtolower($obj);
    include '../class/'.$class.'.php';
}

//Displaying heading part of html
ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");

//Displaying navigation part of html
nav();

//Displaying login form
login_form();

if (isset($_POST['email']) && isset($_POST['pw']))
{
    $email = Validation::getInstance()->filter($_POST['email']);
    $pw = Validation::getInstance()->filter($_POST['pw']);
}

//Displaying footer of html
ramrodeal_footer();

?>
