<?php
/*
$user = 'aacssh@otmail.com';
    $field = (substr_count($user, '@')) ? 'email' : ((strlen($user) == 18 ) ? 'user_id' : 'username');
    echo $field;
    */
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


?>