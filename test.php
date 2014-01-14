<?php
/*
$header = "From: {$from} \n";
//$header .= "Reply-to: {$from} \n";
$header .=  "X-Mailer: PHP/".phpversion()."\n";
$header .= "MIME-Version: 1.0 \n";
$header .= "Content-Type: text/plain; charset=iso-8859-1 \n";
*/

/**
// Pear Mail Library
require_once "Mail.php";

$from = '<from.gmail.com>';
$to = '<to.yahoo.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'johndoe@gmail.com',
        'password' => 'passwordxxx'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
**/

mail('aashish.ghale@gmail.com',"just testing email send function",'email test from ghale laptop');
echo 'Email send to: aashish.ghale@gmail.com';
/*
$user = 'aacssh@otmail.com';
    $field = (substr_count($user, '@')) ? 'email' : ((strlen($user) == 18 ) ? 'user_id' : 'username');
    echo $field;

$orders = array('order by' => 'created', 'order' => 'ASC');
$data = 'ORDER BY';
if(is_array($orders) && !empty($orders)){
    foreach($orders as $value){
        $data .= ' '.$value;
    }
    echo 'hello'.$data;
}

$action = 'select';
$table = 'photo';
$where = "";
$order_clause = '';
$limit = 'limit gere';
echo '<br>';
echo $sql = "{$action} FROM {$table} {$where_clause} {$order_clause} {$limit}";

$deal->getAllDeal(array(
        'where_clause' => array(
            'name', '=', 'Aashish'
        ),
        'limit_clause' => array(
            'LIMIT' => $perPage,
            'OFFSET' => $pagination->offset()
        ),
        'order_clause' => array(
            'order by' => 'created',
            'order' => 'DESC'
        )
    ));

*/

$value = 'aashsish';
if(!$value){
    echo 'bigfoot';
} else{
    echo 'gravity';
}
?>