<?php
class Address
{
    private $_db;
    private $_data;
    private static $_addressinstance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getAddressInstance(){
        if(empty(self::$_addressinstance)){
            self::$_addressinstance = new Address();
        }
        return self::$_addressinstance;
    }
    
    public function checkAddress($add = array()){
        $this->_address = array(
            'where_clause' => array(
                array(
                    'city', '=', $add[0]
                ),
                array(
                    'district', '=', $add[1]
                ),
                array(
                    'country', '=', $add[2]
                )
            )
        );
        $this->_db->get('address', 'address_id', $this->_address);

        if($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return true;
        }
        return false;
    }

    public function getAddress($values, $where = null){
        $this->_db->get('address', $values, $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }

    public function getAllAddress($where = null){
        $this->_db->get('address', '*', $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function data(){
        return $this->_data;
    }

}
?>