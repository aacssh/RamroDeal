<?php
class Category
{
    private $_name,
            $_data;
    
    private static $_categoryinstance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public function getCategoryInstance(){
        if(!isset(self::$_categoryinstance)){
            self::$_categoryinstance = new Category();
        }
        return self::$_categoryinstance;
    }
    
    public function setProperty($name){
        $this->_name = $name;
    }
    
    public function addCategory($table, $fields = array()){
        $this->_db->insert($table, $fields);
    }
    
    public function getCategory(){
        $this->_db->get('category', 'name');
        
        if($this->_db->count()){
            $this->_data = $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function getCategoryId(){
        try{
            $this->_db->query("SELECT category_id from category where name = :name");
            $this->_db->bind(':name', $this->_name);
            $this->_db->execute();
            $id = $this->_db->fetchAll();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }

        if ($this->_db->rowCount() == 1)
        {
            return $id;
        } else{
            return 0;
        }
    }
    
    public function data(){
        return $this->_data;
    }
}
?>