<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'gcespcm',
        'db' => 'ramrodeal_test'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include 'class/'.$class.'.php';
});

include 'view/fns.php';
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$home = 'http://localhost/RamroDeal/php/controller/';

if($url === $home.'admin' || $url === $home.'agent' || $url === $home.'customer' || $url === $home.'merchant'){
    if(!Session::exists(Config::get('session/session_name'))){
        Redirect::to('index.php');
    }
}
/*
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count()){
        $user = new User($hashCheck->fetchSingle()->user_id);
        $user->login();
    }
}
*/