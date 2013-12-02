<?php
/**
 * Defines core functionlity for data validation
 * 
 * Validation class performs specific task in system
 * via filter() method
 *
 * @author Aashish Ghale <aashish.ghale@gmail.com>
 */
class Validate{
    /**
     * Used to store the string for validation
     * @var string
     */
    private $_var;
    
    private $_passed = false,
            $_errors = array(),
            $_db = null;
    
    /**
     * Used to store the instance of the class
     * @var object
     */
    private static $_validateinstance;
    
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
    public static function getValidateInstance(){
	if (!isset(self::$_validateinstance)){
	    self::$_validateinstance = new Validate();
	}
	return self::$_validateinstance;
    }
    
    /**
     * Creates an instance
     */
    private function __construct(){
        $this->_db = DB::getDBInstance();
    }
    
    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                $value = $this->filter($source[$item]);

                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } else if(!empty($value)){
                   switch($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                        break;
                        case 'email':
                            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                                $this->addError("Invalid {$item}");
                            }
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                        break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if($check->count()){
                                $this->addError("{$item} already exist");
                            }
                        break;
                   }
                }
            }
        }
        
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }
    
    /**
     * Perform the key operation of sanitizing the data by the class
     * Try/catch block is used to handle the possible error
     * 
     * @param   string  $var  This var stores string of any length
     * @return  string        false on failure, true of success
     */
    public function filter($var)
    {
        $this->_var = strip_tags($var);
        $this->_var = htmlentities($this->_var, ENT_QUOTES);
        $this->_var = stripslashes($this->_var);
	return trim($this->_var);
    }
    
    public function addError($error){ 
        $this->_errors[] = $error;
    }
    
    public function errors(){
        return $this->_errors;
    }
    
    public function passed(){
        return $this->_passed;
    }
}
?>