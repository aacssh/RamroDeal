<?php
class RandomCode {
    private $_length;
    private $_charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    private $_code = '';
    private $_count;
    private static $_randominstance;
    
    private function __construct(){}
    
    public function getRandomCodeInstance(){
        if(empty(self::$_randominstance)){
            self::$_randominstance = new RandomCode();
        }
        return self::$_randominstance;
    }

    public function randCode($length)
    {
        if(is_int($length)){
            $this->_length = $length;
            $this->_count = strlen($this->_charset)-1;
            while ($this->_length--)
            {
                $this->_code .= $this->_charset[mt_rand(0, $this->_count)];
            }
            return $this->_code;
        } else{
            throw new Exception('Parameter should be a number');
        }
    }
}

    
?>