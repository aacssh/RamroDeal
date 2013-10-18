<?php

class Validation
{
    private $_var;
    public static $instance;
    
    public static function getInstance(){
	if (!isset(self::$instance)){
	    self::$instance = new Validation();
	}
	return self::$instance;
	
    }
    
    public function filter($var)
    {
	$this->_var = $var;
        $this->_var = strip_tags($this->_var);
        $this->_var = htmlentities($this->_var, ENT_QUOTES);
        $this->_var = stripslashes($this->_var);
	return trim($this->_var);
    }
}
?>
