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
    
    public function setProperty($args = array()){
        if (is_array($args)){
            if(isset($args['id'])){
                $this->_category_id = $args['id'];
            }
            if(isset($args['deal_id'])){
                $this->_deal_id = $args['deal_id'];
            }
            if(isset($args['name'])){
                $this->_name = $args['name'];
            }
            if(isset($args['org_price'])){
                $this->_org_price = $args['org_price'];
            }
            if(isset($args['off_price'])){
                $this->_off_price = $args['off_price'];
            }
            if(isset($args['min_people'])){
                $this->_min_people = $args['min_people'];
            }
            if(isset($args['max_people'])){
                $this->_max_people = $args['max_people'];
            }
            if(isset($args['s_date'])){
                $this->_s_date = $args['s_date'];
            }
            if(isset($args['e_date'])){
                $this->_e_date = $args['e_date'];
            }
            if(isset($args['coupon_valid_from'])){
                $this->_coupon_valid_from = $args['coupon_valid_from'];
            }
            if(isset($args['coupon_valid_till'])){
                $this->_coupon_valid_till = $args['coupon_valid_till'];
            }
            if(isset($args['merchant_id'])){
                $this->_merchant_id = $args['merchant_id'];
            }
            if(isset($args['image_id'])){
                $this->_image_id = $args['image_id'];
            }
        } else{
            throw new Exception('Argument should be an array');
        }
    }
    
    public function add($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getAllDeal(){
        try{
            $this->_db->get('deal',$this->_allValues);
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