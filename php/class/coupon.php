<?php
class Coupon{
	private $_couponId;
	private $_coupon = 'coupon_no';
	private $_table = 'coupon';
    private $_db = null;
    private $_data = null;
	private static $_couponInstance;

	private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getCouponInstance(){
        if(empty(self::$_couponInstance)){
            self::$_couponInstance = new Coupon();
        }
        return self::$_couponInstance;
    }

    public function add($fields = array()){
    	 if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem saving the coupon');
        }
    }

     public function getSingleCoupon($where = array()){
        $this->_db->get($this->_table, 'coupon_no, date, status, deal_id', $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return $this;
        }
        return false;
    }

    public function getAllData($where = array()){
        $this->_db->get($this->_table, 'coupon_no, date, deal_id, user_id', $where);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }

    public function updateStatus($where_name = null, $where_value = null, $where = array()){
        if(!$this->_db->update('coupon', $where_name, $where_value, $where)){
            throw new Exception('There was a problem updating.');
        } else{
           return true;
        }
    }
    
    public function getAll($values = null){
        $this->_db->get($this->_table, $this->_coupon);
        
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