<?php
class Redirect {
    
    public static function to($location = null){
        $host = $_SERVER['HTTP_HOST'];
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        //include 'includes/error/404.php';
                        exit();
                    break;
                }
            } elseif($location === 'index.php'){
                $url = 'http://' .$host.'/RamroDeal/' . $location;
                header('Location:'. $url);
                exit();
            }
            
            $url = 'http://' .$host. dirname($_SERVER['PHP_SELF']) . $location;
            header('Location:'. $url);
            exit();
        }
    }
}
?>