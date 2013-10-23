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
    
    public function deleteSession(){
        // Delete the session vars by clearing the $_SESSION array
        $_SESSION = array();
        
        // Delete the session cookie by setting its expiration to an hour ago (3600)
        if (isset($_COOKIE[session_name()]))
        {
            // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
            setcookie(session_name(), '', time() - 3600);
        }
        //destroy session
        session_destroy();
    }
    
    public function deleteCookie(){
        if (isset($_SESSION[$this->_session]))
	{
	    $this->deleteSession();
            
	    setcookie($this->_session, '', time() - 3600);
	}
        
        //Redirect to the home page
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/RamroDeal/php/index.php ';
        header('Location: ' . $home_url);
    }
    
    public function checkSession(){
        if (!isset($_SESSION[$this->_session])) {
            if (isset($_COOKIE[$this->_session]) && $_COOKIE[$this->_session]){
                $_SESSION[$this->_session]=$_COOKIE[$this->_session];
                $_SESSION[$this->_session] = $_COOKIE[$this->_session];
                
                if (($_SESSION[$this->_session] =='Agent') || ($_SESSION['position'] == 'Operator') || ($_SESSION['position'] == 'Special Member'))
                {
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
                    header('Location: ' . $home_url);
                }
                elseif($_SESSION[$this->_session] == 'Representative')
                {
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/representativeHomepage.php';
                    header('Location: ' . $home_url);
                }else
                {
                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/adminHomepage.php';
                    header('Location: ' . $home_url);
                }
            }
            else{
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            }
	}
    }
    
    
}
?>