<?php
class Company extends Contacts
{
    private $_type;
    private $_name;
    private $_email;
    private $_mobileno;
    private $_phoneno;
    private $_db;
    private $_address;
    private $_code;
    private $_companyinstance;
    
    private function __construct($args, $db, $code){
        if (is_object($db) || is_object($code)){
            $this->_code = $cd;
            $this->_db = $db;
        } else{
            throw new Exception("Parameter passed should be an object");
        }

        if (is_array($args))
        {
            if (isset($args['type']))
            {
                $this->_type = $args['type'];
            }

            if (isset($args['name']))
            {
                $this->_name = $args['name'];
            }
            
            if (isset($args['email']))
            {
                $this->_email = $args['email'];
            }
            
            if (isset($args['mobileno']))
            {
                $this->_mobileno = $args['mobileno'];
            }
            
            if (isset($args['phoneno']))
            {
                $this->_phoneno = $args['phoneno'];
            }
            
            if (isset($args['code']))
            {
                $this->_code = $args['code'];
            }
        } else{
            throw new Exception("Arguments should be an array");
        }
    }
    
    public function getCompanyInstance(){
        if(empty(self::$_companyinstance)){
            self::$_companyinstance = new Company();
        }
        return self::$_companyinstance;
    }
    
    public function addCompany(){
        try{
            $this->_db->query("INSERT INTO company (company_id, name, office_no, mobile_no, join_date, type, address_id)
                              VALUE (:id, :name, :office_no,:mobile_no, :join_date, :type, :address)");
            $this->_db->bind(':id', $this->_id);
            $this->_db->bind(':name', $this->_name);
            $this->_db->bind(':office_no', $this->_phoneno);
            $this->_db->bind(':mobile_no', $this->_mobileno);
            $this->_db->bind(':join_date', 'now()');
            $this->_db->bind(':type', $this->_type);
            
            $this->_db->execute();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }
        return 'Successfully added';
    }

    /*
    public function getCategory(Category $category){
        return $Category->
    }*/
}
?>