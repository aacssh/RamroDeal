<?php
class RandomCode {
    public static function randCode($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'){
        if(is_int($length)){
            $count = strlen($charset)-1;
            while ($length--)
            {
                $code .= $charset[mt_rand(0, $count)];
            }
            return $code;
        } else{
            throw new Exception('Parameter should be a number');
        }
    }
}
?>