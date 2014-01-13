<?php
class Image
{
    private $_image_id;
    private $_type = array();
    private $_size = array();
    private $_filename = array();
    private $_path = array();
    public $_error = array();
    protected $_table = 'image';
    private $_db;
    private $_data = array();
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
        
                $target_path[$i] = '/var/www'.UPLOADPATH. $this->_filename[$i];
        
                if(file_exists($target_path[$i])) {
                    $this->addError("The file {$this->_filename[$i]} already exists.");
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
    
    public function add($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
        return true;
    }
    
    public function getSingleId($where = array()){
        $this->_db->get($this->_table, 'image_id', $where);

        if($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return $this;
        }
        return false;
    }
    
    public function addError($error){
        $this->_error[] = $error;
    }
    
    public function error(){
        return $this->_error;
    }
    
    public function getCoverImage($where){
        try{
            $this->_db->get($this->_table, 'cover_image', $where);
        } catch(PDOException $e){
            echo die($e->getMessage());
        }

        if ($this->_db->count()){
            $this->_data = $this->_db->fetchSingle();
            return $this;
        }
        return false;
    }
    
    public function getAllImage($where = array()){
        try{
            $this->_db->get($this->_table, 'cover_image, image1, image2', $where);
        } catch(PDOException $e){
            echo die($e->getMessage());
        }

        if ($this->_db->count()){
            $this->_data =  $this->_db->fetchAll();
            return $this;
        }
        return false;
    }
    
    public function data(){
        return $this->_data;
    }
}
?>