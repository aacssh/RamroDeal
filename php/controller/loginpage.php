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
    $filter = Validation::getValidationInstance();
    $email = $filter->filter($_POST['email']);
    $pw = $filter->filter($_POST['pw']);
    
    $login = Login::getLoginInstance();
    
    $login->setProperty($email, $pw, Database::getDBInstance());
    
    $login->login();
}

//Displaying footer of html
ramrodeal_footer();

?>
