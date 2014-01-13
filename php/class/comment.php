<?php
class Comment {
    private $_table = 'comments';
    private $_db = null;
    private $_id,
            $_dealId,
            $_created,
            $_userId,
            $_body;
    private static $_commentInstance = null;
    
    private function __construct(){
        $this->_db = Database::getDBInstance();
    }
    
    public static function getCommentInstance(){
        if(empty(self::$_commentInstance)){
            self::$_commentInstance = new Comment();
        }
        return self::$_commentInstance;
    }
    
    public function setProperty($dealId, $created, $userId, $comment){
        if(empty($dealId) || empty($created) || empty($userId) || empty($comment)){
            $this->_dealId = $dealId;
            $this->_created = $created;
            $this->_userId = $userId;
            $this->_body = $comment;
            return true;
        }else{
            return false;
        }
    }
    
    public function add($fields = array()){
        if(!$this->_db->insert($this->_table, $fields)){
            throw new Excepton('There was a problem registering the company');
        }
    }
    
    public function getAll($where = array(), $order = array()){
        $this->_db->get($this->_table, '*', $where, $order);
        
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