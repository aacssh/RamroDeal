<?php
session_start();
if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['email']) && $_COOKIE['type']){
        $_SESSION['email']=$_COOKIE['email'];
        $_SESSION['type'] = $_COOKIE['type'];
        
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
    else{
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php';
        header('Location: ' . $home_url);
    }
}
?>