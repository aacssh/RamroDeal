<?php
session_start();
include_once('../view/fns.php');

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include '../class/'.$class.'.php';
});

$msg = '';
if (isset($_POST['email']) && isset($_POST['pw']))
{
    $filter = Validation::getValidationInstance();
    $email = $filter->filter($_POST['email']);
    $pw = $filter->filter($_POST['pw']);
    
    $login = Log::getLogInstance();
    
    $login->setProperty($email, $pw, Database::getDBInstance());
    
    $msg = $login->login();
}

//Displaying heading part of html
ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");

//Displaying navigation part of html
nav();

if (empty($_SESSION['email']))
{
    //Displaying login form
    login_form();
    echo $msg;
} else{
    switch($_SESSION['type']){
        case 'administrator':
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin/adminHomepage.php';
            header('Location: ' . $home_url);('Location: ' . $home_url);
            break;
        
        case 'sub-administrator':
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin/subAdminHomepage.php';
            header('Location: ' . $home_url);('Location: ' . $home_url);
            break;
        
        case 'merchant':
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/merchant/merchantHomepage.php';
            header('Location: ' . $home_url);('Location: ' . $home_url);
            break;
        
        case 'agent':
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/agent/agentHomepage.php';
            header('Location: ' . $home_url);('Location: ' . $home_url);
            break;
        
        default:
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/customer/customerHomepage.php';
            header('Location: ' . $home_url);('Location: ' . $home_url);
    }
}

//Displaying footer of html
ramrodeal_footer();

?>
