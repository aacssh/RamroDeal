<?php
/**
 * Defines core functionlity for login
 * 
 * Login class perform specific tasks in system via login()
 * and logout() method
 *
 * @author Aashish Ghale <aashish.ghale@gmail.com>
 */
class Log
{
 /**
     * Stores username for login process
     * @var string
     */
    private $_username;
    
    /**
     * Stores password for login process
     * @var string
     */
    private $_password;
    
    /**
     * Used to store the instance of Login class
     * @var object
     */
    private static $_logininstance;
    
    /**
     * Used to store the instance of Database class
     * @var object
     */
    private $_db;
    
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
     public static function getLoginInstance(){
	 if(!isset(self::$_logininstance)){
            self::$_logininstance = new Log();
        }
        return self::$_logininstance;
     }

    
    /**
     * Creates an instance
     */
    private function __construct(){}
    
    /**
     * Performs the operation of setting variables
     *
     * @param  string  $username  This contains string(email) of any length
     * @param  string  $pw        This contains string of any length
     * @param  object  $db        This contains an object of Database class
     */
    public function setProperty($email, $pw, $db){
	$this->_email = $email;
	$this->_password = $pw;
	$this->_db = $db;
    }
    
    public function getProperty(){
	echo $this->_username;
	echo $this->_password;
	echo $this->_db->test();
    }
    
    public function login(){
	if (!empty($this->_email) && !empty($this->_password))
        {
	    try{
		// Look up the username and password in the database
		$this->_db->query("select email from login where email = :uname and password=SHA(:pw)");
		$this->_db->bind(':uname', $this->_email);
		$this->_db->bind(':pw', $this->_password);
		$this->_db->execute();
		$rowlogin = $this->_db->fetchAll();
	    } catch(PDOException $e){
		echo die($e->getMessage());
	    }
	    
            if ($this->_db->rowCount() == 1)
            {
		try{
			// The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
			echo $rowlogin[0]['email'];
			
			/*$_SESSION['email'] = $row[0]['email'];
			setcookie('email', $row[0]['email'], time() + (60 * 60 * 24));
			$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
			$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
			header('Location: ' . $home_url);('Location: ' . $home_url);*/
			
			try{
			    $result=$this->_db->query("select type from person where email = :email");
			    $this->_db->bind(':email', $this->_email);
			    $this->_db->execute();
			    $rowperson = $this->_db->fetchAll();
				
			} catch(PDOException $e){
			    echo die($e->getMessage());
			}
			
			if($this->_db->rowCount() == 1){
			    echo $rowperson[0]['type'];
			    /*$_SESSION['type'] = $row[0]['type'];
			    setcookie('type', $row[0]['type'], time() + (60 * 60 * 24));
			    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
			    header('Location: ' . $home_url);*/
			} else{
			    try{
				$result=$this->_db->query("select type from company where email = :email");
				$this->_db->bind(':email', $this->_email);
				$this->_db->execute();
				$rowcompany = $this->_db->fetchAll();
			    } catch(PDOException $e){
				echo die($e->getMessage());
			    }
			    if($this->_db->rowCount() == 1){
				echo $rowcompany[0]['type'];
				/*$_SESSION['type'] = $row[0]['type'];
				setcookie('type', $row[0]['type'], time() + (60 * 60 * 24));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
				header('Location: ' . $home_url);
				*/
			    }
			}
		}catch(Exception $e){
			echo nl2br($e->getMessage());
			echo nl2br($e->getCode());
			echo nl2br($e->getFile());
			echo $e->getLine();
		}
            }
            else {
                // The username/password are incorrect so set an error message
                $error_msg = "<p><div class='control-group info'>
                            <h1 class='control-label text-center btn btn-large btn-block'>Incorrect password or username</h1></div></p>";
                echo $error_msg;
            }
	}
        else {
            // The username & password weren't entered so set an error message
            $error_msg = "<p><div class='control-group info'>
                        <h1 class='control-label text-center btn btn-large btn-block'>fields are empty</h1></div></p>";
            echo $error_msg;
        }
    }
    
    public function logout(){
	if (isset($_SESSION['id']))
	{
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
	    
	    // Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
	    setcookie('id', '', time() - 3600);
	    setcookie('username', '', time() - 3600);
	}	
	    //Redirect to the home page
	    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php ';
	    header('Location: ' . $home_url);
    }
}
?>