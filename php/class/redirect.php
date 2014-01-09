<?php
class Redirect {
    public static function to($location = null, $data = null){
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
                $url = 'http://' . $_SERVER['HTTP_HOST'].BASE_URL . $location;
                header('Location:'. $url);
                exit();
            }
            
            if($data){
                $url = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL.'php/controller/' . $location.'?'.$data;
                header('Location:'. $url);
                exit();
            }else{
                $url = 'http://' . $_SERVER['HTTP_HOST'] . BASE_URL.'php/controller/' . $location;
                header('Location:'. $url);
                exit();
            }
        }
    }
}
?>