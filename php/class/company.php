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
    
    public function getAllCompany($values = null){
        $this->_db->get($this->_table, $values);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getId($where = array()){
        $this->_db->get($this->_table, $this->_companyId, $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function deleteCompany($value){
        $this->_db->delete($this->_table, array(
            'where_clause' => array(
                $this->_companyId, '=', $value
            )
        ));

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