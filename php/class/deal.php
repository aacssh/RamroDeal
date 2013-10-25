<?php
class Deal
{
    private $_category_id;
    private $_name;
    private $_org_price;
    private $_off_price;
    private $_min_people;
    private $_max_people;
    private $_s_date;
    private $_e_date;
    private $_coupon_valid_from;
    private $_coupon_valid_till;
    private $_cover_image;
    private $_first_image;
    private $_second_image;
    private $_db;
    private static $_deal_instance;
    
    private function __construct(){}
    
    public function getDealInstance(){
        if(empty(self::$_deal_instance)){
            self::$_deal_instance = new Deal();
        }
        return self::$_deal_instance;
    }
    
    public function setProperty($args, $db){
        if (is_object($db)){
            $this->_db = $db;
            
            if (is_array($args)){
                if(isset($args['id'])){
                    $this->_category_id = $args['id'];
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
                if(isset($args['cover_image'])){
                    $this->_cover_image = $args['cover_image'];
                }
                if(isset($args['first_image'])){
                    $this->_first_image = $args['first_image'];
                }
                if(isset($args['second_image'])){
                    $this->_second_image = $args['second_image'];
                }                
            } else{
                throw new Exception('Argument should be an array');
            }
        } else{
            throw new Exception('Argument should be an object');
        }
    }
    
    public function addDeal(){
        
    }
}

?>