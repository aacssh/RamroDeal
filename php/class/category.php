<?php
class Category
{
    private $_name,
            $_table = 'category',
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
        $this->_db->get('category', 'name');
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getCategoryId($categoryName = null){
        $this->_db->get($this->_table, 'name');
        
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