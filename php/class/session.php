<?php
class Session
{
    private $_session;
    private $_cookie;
    private $_sessioninstance;
    
    private function __construct(){}
    
    public function getSessionInstance(){
        if(!isset(self::$_sessioninstance)){
            self::$_sessioninstance = new Session();
        }
        return self::$_sessioninstance;
    }
    
    public function setSession($session){
        $this->_session = $session;
        return $_SESSION[$this->_session] = $session;
    }
    
    public function setCookie(){
        $this->setSession($session);
        setcookie($this->_session, $this->_session, time() + (60 * 60 * 10));
    }
    
    
}
?>