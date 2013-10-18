<?php
/**
 * Defines core functionlity for login
 * 
 * Login class perform specific tasks in system via login()
 * and logout() method
 *
 * @author Aashish Ghale <aashish.ghale@gmail.com>
 */
class Login
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
    private static $logininstance;
    
    /**
     * Used to store the instance of Database class
     * @var object
     */
    private $_db;
    
     /**
     * Creates and store an instance of Database class
     * Checks whether instance of Datbase class is already created
     * or not
     * if not created, it create a new instacne of Database class,
     * otherwise returns the previously created instance
     * 
     * @return Object an object to access other methods of class
     * @param object $instance This is static 
     */
     public static function getLoginInstance(){
	 if(!isset(self::$logininstance)){
            self::$logininstance = new Login();
        }
        return self::$logininstance;
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
    public function setProperty($username, $pw, $db){
	$this->_username = $username;
	$this->_password = $pw;
	$this->_db = $db;
    }
    
    public function getProperty(){
	echo $this->_username;
	echo $this->_password;
	echo $this->_db->test();
    }
    
    public function login(){
	echo 'I am at top';
	
	if (!empty($this->_username) && !empty($this->_password))
        {
	    echo 'I am at second';
	    try{
		// Look up the username and password in the database
		$this->_db->query("select email, password from login where email = :uname and password=SHA(:pw)");
		echo 'I am above bind';
		$this->_db->bind(':uname', $this->_username);
		$this->_db->bind(':pw', $this->_password);
		$this->_db->execute();
		//$row = $this->_db->fetchAll();
	    } catch(PDOException $e){
		echo die($e->getMessage());
	    }
	    
	    echo 'i am third';
            if ($this->_db->rowCount() == 1)
            {
                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
		echo "i'am fourth";
		while ($row = $this->_db->fetchAll()){
			echo $row['email'];
			echo $row['password'];
		}
		
                /*
                $_SESSION['id']=$row['user_id'];
                $_SESSION['username']=$row['user_name'];
                $con_id = $row['contact_id'];
                setcookie('id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['user_name'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomePage_implement.php';
                #header('Location: ' . $home_url);
                
                $result=$this->_db->select("select position from contacts where contact_id='$con_id'");
               
                if ($result->num_rows == 1)
                {
                    $row = $result->fetch_array();
                    $_SESSION['position'] = $row['position'];
                    //echo $_SESSION['position'];
                    setcookie('position',$row['position'], time() + (60 * 60 * 24 * 30));	
                    
                    if (($_SESSION['position'] =='Agent') || ($_SESSION['position'] == 'Operator') || ($_SESSION['position'] == 'Special Member'))
                    {
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/operatorHomepage.php';
                        header('Location: ' . $home_url);
                    }
                    elseif($_SESSION['position'] == 'Representative')
                    {
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/representativeHomepage.php';
                        header('Location: ' . $home_url);
                    }
                    else
                    {
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/adminHomepage.php';
                        header('Location: ' . $home_url);
                    }
                }*/
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
}
?>