<?php
class Deal
{
    private $_category_id;
    private $_deal_id;
    private $_name;
    private $_org_price;
    private $_off_price;
    private $_min_people;
    private $_max_people;
    private $_s_date;
    private $_e_date;
    private $_coupon_valid_from;
    private $_coupon_valid_till;
    private $_merchant_id;
    private $_image_id;
    private $_db;
    private $_data;
    private $_allValues = 'deal_id, name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, description, company_id, image_id';
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
    
    public function add($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getAllDeal($where = array()){
        try{
            $this->_db->get('deal',$this->_allValues, $where);
        } catch(PDOException $e){
            die($e->getMessage());
        }
        
        if ($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return  $this;
        }
        return false;
    }
    
    public function getSingleDeal($where =  array()){
        $this->_db->get('deal',$this->_allValues, $where);
        
        if ($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return  $this;
        }
        return false;
    }

    public function countAll(){
        $this->_db->get('deal','COUNT(*)');
        
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