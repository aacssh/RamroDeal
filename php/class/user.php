<?php
class User {
    private $_db,
            $_data,
            $_sessionName,
            $_isLoggedIn = false,
            $_cookieName;
    
    public function __construct($user = null){
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
            $id = $this->data()->user_id;
        }
        if(!$this->_db->update('user', $id, $fields)){
            throw new Exception('There was a problem updating.');
        } else{
           return true;
        }
    }
    
    public function create($fields = array()){
        if(!$this->_db->insert('user', $fields)){
            throw new Excepton('There was a problem registering the user');
        }
    }
    
    public function find($user = null, $values = null){
        if($user){
            $field = (substr_count($user, '@')) ? 'email' : ((strlen($user) == 18 ) ? 'user_id' : 'username');
            $data = $this->_db->get('user', (empty($values) ? '*' : $values), array(
                'where_clause' => array(
                    $field, '=', $user
                )
            ));
            
            if($data->count()){
                $this->_data = $data->fetchSingle();
                return true;
            }
        }
        return false;
    }
    
    public function getUsers($values = null, $where = array()){
            $data = $this->_db->get('user', $values, $where);

            if($this->_db->count()){
                $this->_data = $this->_db->fetchAll();
                return true;
            }
            return false;
    }
    
    public function delete($value = array()){
        $this->_db->delete('user', $value);
        
        if($this->_db->count()){
            return true;
        }
        return false;
    }
    
    public function login($email = null, $password = null, $remember = false){
        if(!$email && !$password && $this->exists()){
            Session::put($this->_sessionName, $this->data()->user_id);
        }else{
            $user = $this->find($email);

            if($user){
                if($this->data()->password === Hash::make($password, $this->data()->salt)){
                    Session::put($this->_sessionName, $this->data()->user_id);

                    if($remember){
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('user_session', 'hash', array(
                            'where_clause' => array(
                                'user_id', '=', $this->data()->user_id
                            )
                        ));
                        
                        if(!$hashCheck->count()){
                            $this->_db->insert('user_session', array(
                                'user_id' => $this->data()->user_id,
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
        
        echo $this->data()->user_id;
        $this->_db->delete('user_session', array(
            'where_clause' => array(
                'user_id', '=', $this->data()->user_id
            )
        ));
        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }
    
    public function hasPermission($key){
        $group = $this->_db->get('groups', 'permissions', array(
            'where_clause' => array(
                'id', '=', $this->data()->groups
            )
        ));

        if($group->count()){
            $permissions = json_decode($group->fetchSingle()->permissions, true);
            if(@$permissions[$key] == true){
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