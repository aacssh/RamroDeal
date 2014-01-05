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

define('UPLOADPATH', '/RamroDeal/images/'); # upload path for image
define('MAXFILESIZE', 2097152);      // 2 MB

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hash = Database::getDBInstance()->get('user_session', 'user_id', array('hash', '=', $hash));

    if($hash->count()){
        $user = new User($hash->fetchSingle()->user_id);
        $user->login();
    }
}