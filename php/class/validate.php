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
            $_db = null,
            $_addressInstance = null,
            $_imageInstance = null,
            $_address = array(),
            $_image = array();
    
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
        $this->_db = Database::getDBInstance();
        $this->_addressInstance = Address::getAddressInstance();
        $this->_imageInstance = Image::getImageInstance();
    }
    
    public function check($source, $items = array()){
        foreach($items as $item => $rules){
            if($item === 'city' || $item === 'district' || $item === 'country'){
                $this->validateAddress($source, $item);
            } elseif($item === 'cover_image' || $item === 'first_image' || $item === 'second_image'){
                $this->validateImage($item, $_FILES);
            }else{
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
                            break;
                            case 'matches':
                                if($value !== $source[$rule_value]){
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
        }
        
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }
    
    protected function validateAddress($source, $item){
        array_push($this->_address, $this->filter($source[$item]));
        if(count($this->_address) === 3){
            $data = $this->_addressInstance->checkAddress($this->_address);

            if(!$data){
                $this->addError('Invalid address');
            }
        }
    }
    
    protected function validateImage($item, $source){
        array_push($this->_image, $source[$item]);
        if(count($this->_image) === 3){
            $data = $this->_imageInstance->checkImage($this->_image);

            if(!$data){
                foreach($this->_imageInstance->error() as $error){
                    $this->addError($error);
                }
            }
        }
    }
    
    /**
     * Perform the key operation of sanitizing the data by the class
     * Try/catch block is used to handle the possible error
     * 
     * @param   string  $var  This var stores string of any length
     * @return  string        false on failure, true of success
     */
    protected function filter($var)
    {
        $this->_var = strip_tags($var);
        $this->_var = htmlentities($this->_var, ENT_QUOTES);
        $this->_var = stripslashes($this->_var);
	return trim($this->_var);
    }
    
    protected function addError($error){ 
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