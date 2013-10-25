<?php
class Category
{
    private $_name;
    
    private static $_categoryinstance;
    
    private function __construct($db){
        $this->_db = $db; 
    }
    
    public function getCategoryInstance($db){
        if(!isset(self::$_categoryinstance)){
            self::$_categoryinstance = new Category($db);
        }
        return self::$_categoryinstance;
    }
    
    public function setProperty($name){
        $this->_name = $name;
    }
    
    public function addCategory(){
        try{
            $this->_db->query("INSERT INTO category (name) value (:name)");
            $this->_db->bind(':name', $this->_name);
            $this->_db->execute();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }
        return 'Successfully added';
    }
    
    public function getCategory(){
        try{
            $this->_db->query("SELECT name from category");
            $this->_db->execute();
            $list = $this->_db->fetchAll();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }

        if ($this->_db->rowCount() >= 1)
        {
            return $list;
        } else{
            return "No data to display";
        }
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
}
?>