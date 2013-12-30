<?php
class Image
{
    private $_image_id;
    private $_image;
    private $_cover_image;
    private $_first_image;
    private $_second_image;
    private $_type = array();
    private $_size = array();
    private $_filename = array();
    private $_path = array();
    public $_error = array();
    private $_db;
    private static $_image_instance;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getImageInstance(){
        if(empty(self::$_image_instance)){
            self::$_image_instance = new Image();
        }
        return self::$_image_instance;
    }
    
    public function setProperty($args){
        if (is_array($args)){
            if(isset($args['image_id'])){
                $this->_image_id = $args['image_id'];
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
    }

    // Make sure there are no errors
    // Can't save if there are pre-existing errors
    // Can't save without filename and temp location
    // Determine the target_path
    // Make sure a file doesn't already exist in the target location
    // Attempt to move the file
    // Success
    // Save a corresponding entry to the database
    // We are done with temp_path, the file isn't there anymore
    // File was not moved.
    public function checkImage($img = array()){
        if($this->attach_file($img)){
            if(!empty($this->_error)) {
                return false;
            }
            
            for($i = 0; $i < count($img); $i++){
                if(empty($this->_filename[$i]) || empty($this->_temp_path[$i])) {
                    $this->addError('The file location was not available.');
                    return false;
                }
        
                $target_path[$i] = UPLOADPATH. $this->_filename[$i];
        
                if(file_exists($target_path[$i])) {
                    $this->addError('The file {$this->filename} already exists.');
                    return false;
                }
                
                if(!move_uploaded_file($this->_temp_path[$i], $target_path[$i])) {
                    $this->addError('The file upload failed, possibly due to incorrect permissions on the upload folder.');
                    return false;
                }
            }
            return true;
        }
    }
    
    // Perform error checking on the form parameters
    // error: nothing uploaded or wrong argument usage
    // error: report what PHP says went wrong
    // Set object attributes to the form parameters.
    // Don't worry about saving anything to the database yet.
    public function attach_file($item = array()) {
        $x = 0;
        foreach($item as $file){
            if(!$file || empty($file) || !is_array($file)) {
                $this->addError('No file was uploaded.');
                return false;
            } elseif($file['error'] != 0) {
                $this->addError($this->upload_errors[$file['error']]);
                return false;
            } else {
                if((($file['type'] == 'image/gif') || ($file['type'] == 'image/jpeg') ||
                    ($file['type'] == 'image/pjpeg') || ($file['type'] == 'image/png')) &&
                    ($file['size'] > 0) && ($file['size'] <= MAXFILESIZE)){
                    $this->_type[$x] = $file['type'];
                    $this->_size[$x] = $file['size'];
                    $this->_temp_path[$x]  = $file['tmp_name'];
                    $this->_filename[$x]   = basename($file['name']);
                } else{
                    $this->addError('File format not supported.');
                    return false;
                }
            }
            $x++;
        }
        return true;
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
            return false;
    }
    
    public function addError($error){
        $this->_error[] = $error;
    }
    
    public function getImage($image_id){
        try{
            $id = array('image_id', '=', $image_id);
            $this->_db->get('image', 'cover_image', $id);
        } catch(PDOException $e){
            echo die($e->getMessage());
        }

        if ($this->_db->count()){
            return $this->_db->fetchSingle();
        }
        return false;
    }
}
?>