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
    private static $_deal_instance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public function getDealInstance(){
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
    
    public function addDeal(){
        try{
            $this->_db->query("INSERT INTO deal (deal_id, name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, coupon_start_date, coupon_end_date, company_id, category_id, image_id) VALUE (:deal_id, :name, :org_price, :off_price, :s_date, :e_date, :min_people, :max_people, :coupon_start, :coupon_end, :merchant_id, :category_id, :image_id)");
            $this->_db->bind(':deal_id', $this->_deal_id);
            $this->_db->bind(':name', $this->_name);
            $this->_db->bind(':org_price', $this->_org_price);
            $this->_db->bind(':off_price', $this->_off_price);
            $this->_db->bind(':s_date', $this->_s_date);
            $this->_db->bind(':e_date', $this->_e_date);
            $this->_db->bind(':min_people', $this->_min_people);
            $this->_db->bind(':max_people', $this->_max_people);
            $this->_db->bind(':coupon_start', $this->_coupon_valid_from);
            $this->_db->bind(':coupon_end', $this->_coupon_valid_till);
            $this->_db->bind(':merchant_id', $this->_merchant_id);
            $this->_db->bind(':category_id', $this->_category_id);
            $this->_db->bind(':image_id', $this->_image_id);
            $this->_db->execute();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return 'Successfully added';
    }
    
    public function getAllDeal(){
        try{
            $values = 'name, actual_price, offered_price, start_date, end_date, minimum_purchase_requirement, maximum_purchase_requirement, total_people, image_id';
            $this->_db->get('deal',$values);
            $list = $this->_db->fetchAll();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        
        if ($this->_db->count()){
            return $list;
        }
        return false;
    }
}

?>