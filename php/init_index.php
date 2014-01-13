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

define('BASE_URL', '/RamroDeal-Boot3/');

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include 'class/'.$class.'.php';
});

/*
 * Server Configuration Details:
 * $mysql_host = "mysql10.000webhost.com";
 * $mysql_database = "a7977676_project";
 * $mysql_user = "a7977676_project";
 * $mysql_password = "gces16";
*/

include 'view/fns.php';

define('UPLOADPATH', '/RamroDeal-Boot3/images/'); # upload path for image
define('MAXFILESIZE', 2097152);      // 2 MB

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hash = Database::getDBInstance()->get('user_session', 'user_id', array(
        'where_clause' => array(
            'hash', '=', $hash
        )
    ));

    if($hash->count()){
        $user = new User($hash->fetchSingle()->user_id);
        $user->login();
    }
}