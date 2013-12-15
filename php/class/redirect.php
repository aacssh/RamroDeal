<?php
class Redirect {
    public static function to($location = null){
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'includes/error/404.php';
                        exit();
                    break;
                }
            } elseif($location === 'index.php'){
                $url = 'http://' . $_SERVER['HTTP_HOST'].'/RamroDeal/' . $location;
                header('Location:'. $url);
                exit();
            }
            
            $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . $location;
            header('Location:'. $url);
            exit();
        }
    }
}
?>