<?php
class Address
{
    private $_zip;
    private $_country;
    private $_state;
    private $_city;
    private $_db;
    private $_data;
    private static $_addressinstance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public function getAddressInstance(){
        if(empty(self::$_addressinstance)){
            self::$_addressinstance = new Address();
        }
        return self::$_addressinstance;
    }
    
    public function setProperty($args = null){
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
                return false;
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAddress(){
        $this->_db->get('address', '*');
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return true;
        }
        
        return false;
    }
    
    public function data(){
        return $this->_data;
    }
}
?>