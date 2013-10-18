<?php
/**
 * Defines core functionlity for data validation
 * 
 * Validation class performs specific task in system
 * via filter() method
 *
 * @author Aashish Ghale <aashish.ghale@gmail.com>
 */
class Validation
{
    /**
     * Used to store the string for validation
     * @var string
     */
    private $_var;
    
    /**
     * Used to store the instance of the class
     * @var object
     */
    private static $validationinstance;
    
    /**
     * Creates and store an instance of the class
     * Checks whether instance of the class is already created
     * or not
     * if not created, it create a new instacne of the class,
     * otherwise returns the previously created instance
     * 
     * @param   object  $instance  This is static
     * @return  object 		   an object to access other methods of class
     */
    public static function getValidationInstance(){
	if (!isset(self::$alidationinstance)){
	    self::$validationinstance = new Validation();
	}
	return self::$validationinstance;
    }
    
    /**
     * Creates an instance
     */
    private function __construct(){}
    
    /**
     * Perform the key operation of sanitizing the data by the class
     * Try/catch block is used to handle the possible error
     * 
     * @param   string  $var  This var stores string of any length
     * @return  string        false on failure, true of success
     */
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
