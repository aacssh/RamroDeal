<?php
$user = 'aacssh@otmail.com';
    $field = (substr_count($user, '@')) ? 'email' : ((strlen($user) == 18 ) ? 'user_id' : 'username');
    echo $field;
?>