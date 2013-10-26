<?php
class Image
{
    private $_cover_image;
    private $_first_image;
    private $_second_image;
    private $_db;
    private static $_image_instance;
    
    private function __construct(){}
    
    public function getImageInstance(){
        if(empty(self::$_image_instance)){
            self::$_image_instance = new Image();
        }
        return self::$_image_instance;
    }
    
    public function setProperty($args, $db){
        if (is_object($db)){
            $this->_db = $db;
            
            if (is_array($args)){
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
    
    public function addImage(){
        try{
            $this->_db->query("INSERT INTO image VALUE (0, :cover_image, :first_image, :second_image)");
            $this->_db->bind(':cover_image', $this->_cover_image);
            $this->_db->bind(':first_image', $this->_first_image);
            $this->_db->bind(':second_image', $this->_second_image);
            $this->_db->execute();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }
        return 'Successfully added';
    }
    
    public function getImageId(){
        try{
            $this->_db->query("SELECT image_id FROM image WHERE cover_image = :cover_image and image1 = :first_image and image2 = :second_image");
            $this->_db->bind(':cover_image', $this->_cover_image);
            $this->_db->bind(':first_image', $this->_first_image);
            $this->_db->bind(':second_image', $this->_second_image);
            $this->_db->execute();
            $id = $this->_db->fetchAll();
        } catch(PDOException $e){
            echo die($e->getMessage());
        }
        
        if ($this->_db->rowCount() == 1)
            return $id;
        else
            return 0;
    }
}

?>