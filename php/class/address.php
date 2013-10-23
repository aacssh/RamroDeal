<?php
class Address
{
    private $_zip;
    private $_country;
    private $_state;
    private $_city;
    private $_db;
    private static $_addressinstance;
    
    private function __construct(){}
    
    public function getAddressInstance(){
        if(empty(self::$_addressinstance)){
            self::$_addressinstance = new Address();
        }
        return self::$_addressinstance;
    }
    
    public function setProperty($args, $db){
        if (is_object($db)){
            $this->_db = $db;
        } else{
            throw new Exception("Parameter passed should be an object");
        }

        if (is_array($args))
        {  
            if (isset($args['city']))
            {
                $this->_city = $args['city'];
            }
            
            if (isset($args['state']))
            {
                $this->_state = $args['state'];
            }
            
            if (isset($args['country']))
            {
                $this->_country = $args['country'];
            }
            
            if (isset($args['zip']))
            {
                $this->_zip = $args['zip'];
            }
        } else{
            throw new Exception("Arguments should be an array");
        }
    }
    
    public function checkAddress(){
        try{
            $this->_db->query("SELECT address_id FROM address
                              where city = :city and state = :state and country = :country and zip = :zip");
            $this->_db->bind(":city", $this->_city);
            $this->_db->bind(":state", $this->_state);
            $this->_db->bind(":country", $this->_country);
            $this->_db->bind(":zip", $this->_zip); 
            $this->_db->execute();
            $id = $this->_db->fetchAll();
            
            if ($this->_db->rowCount() == 1){
                return $id;
            } else{
                return 'Invalid Address';
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>