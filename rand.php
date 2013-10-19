<?php
function randCode($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $code = '';
    $count = strlen($charset)-1;
    while ($length--)
    {
        $code .= $charset[mt_rand(0, $count)];
    }
    return $code;
}

echo randCode(18);
    
?>