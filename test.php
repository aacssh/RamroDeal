<?php
/*
 * function get($table, $values, $where = null){
    
        $sql = 'SELECT '. $values;
    
    return $sql;
 }
 
$values = 'name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, image_id';
 
 echo get('deal',$values);
 
 echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
 echo '<br><br><br>';
 */

$wheres = array('je', '=', 'kslf');
 
$wheres = array(
    array('je', '=', 'kslf'),
    array('ke', '=', 'kslf')
);

$wheres = array('je', '=', 'kslf');

$i = 1;
$values = array();

 if(!empty($wheres)){
    if(is_array($wheres[1])){
        foreach($wheres as $where){
            if(count($where) === 3){
                $operators = array('=', '>', '<', '>=', '<=');
    
                $field      = $where[0];
                $operator   = $where[1];
                $value      = $where[2];
                
                echo $field.'   '.$operator.'   '.$value.'<br>';
    
                if(in_array($operator, $operators)){
                    $where_clause .= "{$field} {$operator} ?";
                    array_push($values, $value);
                    
                    if($i < count($wheres)){
                        $where_clause .= ' AND ';
                    }
                }
            }
            $i++;
        }
    } else{
        if(count($wheres) === 3){
            $operators = array('=', '>', '<', '>=', '<=');

            $field      = $wheres[0];
            $operator   = $wheres[1];
            $value      = $wheres[2];
            
            echo $field.'   '.$operator.'   '.$value.'<br>';

            if(in_array($operator, $operators)){
                $where_clause .= "{$field} {$operator} ?";
                array_push($values, $value);
            }
        }
    }

    $sql = "{$action} FROM {$table} WHERE {$where_clause}";

    if(!$this->query($sql, $values)->error()){
        return $this;
    }
 }
 
 echo $where_clause.'<pre>'. print_r($values, true).'</pre>';
?>