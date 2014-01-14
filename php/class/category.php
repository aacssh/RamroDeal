<?php
class Category
{
    private $_nameField = 'name',
            $_table = 'category',
            $_categoryId = 'category_id',
            $_db = null,
            $_data;
    
    private static $_categoryinstance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getCategoryInstance(){
        if(!isset(self::$_categoryinstance)){
            self::$_categoryinstance = new Category();
        }
        return self::$_categoryinstance;
    }

    public function addCategory($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getCategory(){
        $this->_db->get($this->_table, $this->_nameField);
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getSingleId($where = array()){
        $this->_db->get($this->_table, $this->_categoryId, $where);
        if($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return $this;
        }
        return false;
    }
    
    public function __clone(){
        
    }
    
    public function data(){
        return $this->_data;
    }
}
?>