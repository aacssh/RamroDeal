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
    private static $_companyinstance;
    
    private function __construct(){}
    
    public function getCompanyInstance(){
        if(empty(self::$_companyinstance)){
            self::$_companyinstance = new Company();
        }
        return self::$_companyinstance;
    }
    
    public function setProperty($args, $db){
        if (is_object($db)){
            if(isset($db)){
                $this->_db = $db;
            }
        } else{
            throw new Exception("Parameter passed should be an object");
        }

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
    
    public function addCompany($log){
        $this->_log = $log;
        try{
            $this->_db->beginTransaction();
            $this->_log->signUp();
            $this->_db->query("INSERT INTO company (company_id, name, office_no, mobile_no, join_date, type, address_id, person_id, email)
                              VALUE (:id, :name, :office_no,:mobile_no, now(), :type, :address, 'pkkOkMcBoTMGRvI72T', :email)");
            $this->_db->bind(':id', $this->_code);
            $this->_db->bind(':name', $this->_name);
            $this->_db->bind(':office_no', $this->_phoneno);
            $this->_db->bind(':mobile_no', $this->_mobileno);
            $this->_db->bind(':type', $this->_type);
            $this->_db->bind(':address', $this->_address_id);
            $this->_db->bind(':email', $this->_email);
            $this->_db->execute();
            $this->_db->endTransaction();
        } catch(PDOException $e){
            $this->_db->cancelTransaction();
            die($e->getMessage());
        }
        return 'Successfully added';
    }
    
    public function getCompany(){
        try{
            $this->_db->query("SELECT name FROM company");
            $this->_db->execute();
            $companylist = $this->_db->fetchAll();
            
            if($this->_db->rowCount() > 0){
                return $companylist;
            } else{
                return 0;
            }
        } catch(PDOException $e){
            die($e->getMessage());
        }
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
}
?>