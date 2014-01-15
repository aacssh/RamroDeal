<?php
function addDeal($query){
    $db = new mysqli(Config::get('mysql/host'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/db'));
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database. Please try again later.';
        exit;
    }
    mysqli_query($db,$query) or die("Error: ".mysqli_error($db));
    mysqli_close($db);
    return true;
}
?>