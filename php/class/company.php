<?php
class Company
{
    private $_type;
    private $_name;
    private $_email;
    private $_mobileno;
    private $_phoneno;
    private $_db;
    private $_address_id;
    private $_code;
    private $_log;
    private $_data;
    private static $_companyinstance;
    
    private function __construct(){
        $this->_db  = Database::getDBInstance();
    }
    
    public function getCompanyInstance(){
        if(empty(self::$_companyinstance)){
            self::$_companyinstance = new Company();
        }
        return self::$_companyinstance;
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
        if(!$this->_db->insert('company', $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getCompany(){
        $this->_db->get('company', 'name');
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getAgent(){
        try{
            $this->_db->query("SELECT name FROM company WHERE type=':agent'");
            $this->_db->bind(':agent', 'agent');
            $this->_db->execute();
            $agentlist = $this->_db->fetchAll();
            
            if($this->_db->rowCount() > 0){
                return $agentlist;
            } else{
                return 0;
            }
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
    
    public function data(){
        return $this->_data;
    }
}
?>