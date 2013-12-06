<?php
function get($table, $values, $where = null){
    
        $sql = 'SELECT '. $values;
    
    return $sql;
 }
 
$values = 'name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, image_id';
 
 echo get('deal',$values);
 
 echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
 echo '<br><br><br>';
 $wheres = array(
                 array('je', '=', 'kslf'),
                 array('34', '=', 'kwer')
                 );
 
 if(!empty($wheres)){
    foreach($wheres as $where){
    }
        echo '<pre>'.print_r($where, true).'</pre>';
    }
 
?>