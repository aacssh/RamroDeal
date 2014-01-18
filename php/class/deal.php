<?php
class Deal
{
    private $_db;
    private $_data = null;
    private $_allValues = 'deal_id, name, actual_price, actual_price_in_dollar, offered_price, offered_price_in_dollar, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, coupon_start_date, coupon_end_date, description, company_id, category_id, image_id, status';
    private static $_deal_instance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getDealInstance(){
        if(empty(self::$_deal_instance)){
            self::$_deal_instance = new Deal();
        }
        return self::$_deal_instance;
    }
    
    public function add($deal_id = NULL, $name = null, $actual_price = null, $offered_price = null, $actual_price_dollar = null, $offered_price_dollar = null, $start_date =null, $end_date = null, $min_requirement = null, $max_requirement = null, $s_coupon = null, $e_coupon = null, $desc = null, $company_id = null, $category_id = null, $image_id = null){
        if(!$this->_db->addDeal("INSERT INTO deal ($this->_allValues)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
            array($deal_id, $name, $actual_price,  $actual_price_dollar, $offered_price, $offered_price_dollar, $start_date, $end_date, $min_requirement, $max_requirement,0, $s_coupon, $e_coupon, $desc, $company_id, $category_id, $image_id, 0)
        )){
            return false;
        }
        return true;
    }
    
    public function getAllDeal($where = array()){
        $data = $this->getAll($this->_allValues, $where);
        return $data;
    }

    public function getNoOfPeople($where = array()){
        $data = $this->getSingle('total_people', $where);
        return $data;
    }
    
    public function getSingleDeal($where =  array()){
        $data = $this->getSingle($this->_allValues, $where);
        return $data;
    }

    public function getDate($value = null, $where =  array()){
        $data = $this->getAll($value, $where);
        return $data;
    }

    public function updateNoOfPeople($where_name, $where_value, $where){
        if(!$this->_db->update('deal', $where_name, $where_value, $where)){
            throw new Exception('There was a problem updating.');
        } else{
           return true;
        }
    }

    public function updateStatus($where_name = null, $where_value = null, $where = array()){
        if(!$this->_db->update('deal', $where_name, $where_value, $where)){
            throw new Exception('There was a problem updating.');
        } else{
           return true;
        }
    }

    public function search($where){
        $data = $this->getAll('*', $where);
        return $data;   
    }

    public function countAll($where = array()){
        $data = $this->getSingle('COUNT(*)', $where);
        return $data;
    }

    protected function getAll($value = null, $where = array()){
        $this->_db->get('deal',$value, $where);
        
        if ($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return  $this;
        }
        return false;
    }

    protected function getSingle($values, $where){
        $this->_db->get('deal',$values, $where);
        
        if ($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return  $this;
        }
        return false;
    }
    
    public function data(){
        return $this->_data;
    }
}
?>