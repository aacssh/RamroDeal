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

define('BASE_URL', '/RamroDeal/');

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include 'class/'.$class.'.php';
});

Session::regenerate();

// For paypal
$PayPalMode         = 'sandbox'; // sandbox or live
$PayPalApiUsername  = 'aashish.ghale-facilitator_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword  = '1389101617'; //Paypal API password
$PayPalApiSignature     = 'AFcWxV21C7fd0v3bYYYRCpSSRl31AisvknBnflU33MhThlVgsDn9ZBBE'; //Paypal API Signature
$PayPalCurrencyCode     = 'USD'; //Paypal Currency Code
$PayPalReturnURL    = 'http://ramrodeal.com'.BASE_URL.'php/controller/members/success.php'; //Point to process.php page
$PayPalCancelURL    = 'http://ramrodeal.com'.BASE_URL.'php/controller/members/cancel_url.php'; //Cancel URL if user clicks cancel

include 'view/fns.php';

define('UPLOADPATH', '/RamroDeal/images/'); # upload path for image
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

$date = date("Y-m-d");
$deal = Deal::getDealInstance();
$deal->getDate('end_date, total_people, minimum_purchase_requirement, maximum_purchase_requirement', array(
    'where_clause' => array(
        'end_date', '=', date('Y-m-d')
    )
));

$data = (array)$deal->data();
if(!empty($data)){
    $i = 0;
    while($i < count($data)){
        if($data[$i]->total_people === $data[$i]->maximum_purchase_requirement){
            $deal->updateStatus('end_date', $data[$i]->end_date, array(
                'status' => '2'
            )); //2 for success
        }elseif ((strtotime(date('Y-m-d')) > strtotime($data[$i]->end_date)) && ($data[$i]->total_people >= $data[$i]->minimum_purchase_requirement)) {
            $deal->updateStatus('end_date', $data[$i]->end_date, array(
                'status' => '2'
            ));
        }
        elseif((strtotime(date('Y-m-d')) > strtotime($data[$i]->end_date)) && ($data[$i]->total_people < $data[$i]->minimum_purchase_requirement)){
            $deal->updateStatus('end_date', $data[$i]->end_date, array(
                'status' => '1' //1 for failure
            ));
        }
        $i++;
    }
}
    
