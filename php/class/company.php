<?php
class Company
{
    private $_type;
    private $_name;
    private $_email;
    private $_mobileno;
    private $_phoneno;
    private $_db;
    private $_addressId;
    private $_code;
    private $_log;
    private $_data;
    private $_table = 'company';
    protected $_companyId = 'company_id';
    protected $_companyName = 'name';
    private static $_companyInstance;
    
    private function __construct(){
        $this->_db  = Database::getDBInstance();
    }
    
    public static function getCompanyInstance(){
        if(empty(self::$_companyInstance)){
            self::$_companyInstance = new Company();
        }
        return self::$_companyInstance;
    }
    
    public function setProperty($args){
        if (is_array($args)){
            if (isset($args['address_id'])){
                $this->_address_id = $args['address_id'];
            }
            
            if (isset($args['type'])){
                $this->_type = $args['type'];
            }

            if (isset($args['name'])){
                $this->_name = $args['name'];
            }
            
            if (isset($args['email'])){
                $this->_email = $args['email'];
            }
            
            if (isset($args['mobileno'])){
                $this->_mobileno = $args['mobileno'];
            }
            
            if (isset($args['phoneno'])){
                $this->_phoneno = $args['phoneno'];
            }
            
            if (isset($args['code'])){
                $this->_code = $args['code'];
            }
        } else{
            throw new Exception("Arguments should be an array");
        }
    }
    
    public function create($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getSingleCompany($where = array()){
        $this->_db->get($this->_table, $this->_companyName, $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return $this;
        }
        return false;
    }
    
    public function getAllCompany(){
        $this->_db->get($this->_table, 'company_id, name, address');
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getId($where = array()){
        $this->_db->get($this->_table, $this->_company_id, $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function deleteCompany($value){
        $this->_db->delete($this->_table, array($this->_company_id, '=', $value));

        if($this->_db->count()){
            return true;
        }
        return false;
    }

    public function data(){
        return $this->_data;
    }
}
?>