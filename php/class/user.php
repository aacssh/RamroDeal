<?php
class User {
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn,
            $_cookieName;
    
    /**
     * Used to store the instance of Login class
     * @var object
     */
    private static $_userinstance;
    
      /**
     * Creates and store an instance of tje class
     * Checks whether instance of the class is already created
     * or not
     * if not created, it create a new instacne of the class,
     * otherwise returns the previously created instance
     * 
     * @return Object an object to access other methods of class
     * @param object $instance This is static 
     */
     public static function getUserInstance($user = null){
	 if(!isset(self::$_userinstance)){
            self::$_userinstance = new User($user = null);
        }
        return self::$_userinstance;
     }
    
    private function __construct($user = null){
        $this->_db = Database::getDBInstance();
        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
        
        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user = Session::get($this->_sessionName);
                
                if($this->find($user)){
                    $this->_isLoggedIn = true;
                }else{
                    // proccess logout
                }
            }
        }else{
            $this->find($user);
        }
    }
    
    public function update($fields = array(), $id = null){
        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id;
        }
        if(!$this->_db->update('user', $id, $fields)){
            throw new Exception('There was a problem updating.');
        } else{
            echo 'Successfully Updated';
        }
    }
    
    public function create($fields = array()){
        if(!$this->_db->insert('user', $fields)){
            throw new Excepton('There was a problem creating an error');
        }
    }
    
    public function find($user = null){
        if($user){
            $field = (!substr_count($user, '@')) ? 'user_id' : 'email';
            $data = $this->_db->get('user', '*', array($field, '=', $user));
            
            if($data->count()){
                $this->_data = $data->fetchSingle();
                return true;
            }
        }
        return false;
    }
    
    public function login($email = null, $password = null, $remember = false){
        if(!$email && !$password && $this->exists()){
            Session::put($this->_sessionName, $this->data()->id);
        }else{
            $user = $this->find($email);
        
            if($user){
                if($this->data()->password === Hash::make($password, $this->data()->salt)){
                    Session::put($this->_sessionName, $this->data()->id);
                    
                    if($remember){
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
                        
                        if(!$hashCheck->count()){
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        }else{
                            $hash = $hashCheck->fetchSingle()->hash;
                        }
                        
                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }
                    
                    return true;
                }
            }
        }
        return false;
    }
    
    public function logout(){
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }
    
    public function hasPermission($key){
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));
        
        if($group->count()){
            $permissions = json_decode($group->fetchSingle()->permissions, true);
            
            if($permissions[$key] == true){
                return true;
            }
        }
        return false;
    }

    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }
    
    public function data(){
        return $this->_data;
    }
    
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
}
?>