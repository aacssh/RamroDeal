<?php
$user = 'aacssh@otmail.com';
    $field = (substr_count($user, '@')) ? 'email' : ((strlen($user) == 18 ) ? 'user_id' : 'username');
    echo $field .'<br>';
    
    function strings($name, $callback){
        $results = array(
            'upper' => strtoupper($name),
            'lower' => strtolower($name)
        );
        
        if(is_callable($callback)){
            call_user_func($callback, $results);
        }
    }
    
    strings('Aashish', function($name){
        echo $name['upper'];
    });
    
    function names($name){
        $results = array(
            'upper' => strtoupper($name),
            'lower' => strtolower($name)
        );
        return $results;
    }
    
    $myname = names('Aashish');
    echo $myname['upper'];
?>