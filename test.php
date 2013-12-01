<?php
function get($table, $values, $where = null){
    
        $sql = 'SELECT '. $values;
    
    return $sql;
 }
 
$values = 'name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, image_id';
 
 echo get('deal',$values);
 
?>