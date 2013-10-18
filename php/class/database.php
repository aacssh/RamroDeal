<?php

/**
 * Defines core functionlity for database
 * 
 * Database class perform specific tasks like insert, delete, select,
 * update in system via insert(), delete(), select() and update() method
 *
 * @author Aashish Ghale <aashish.ghale@gmail.com>
 */
class Database
{
    /**
     * Used to store the instance of Database class
     * @var object
     */
    public static $_instance;
    
    /**
     * Stores the hostname of database
     * @var string
     */
    private $_host = 'localhost';
    
    /**
     * Stores the username of database
     * @var string
     */
    private $_username = 'root';
    
    /**
     * Stores password for database
     * Optionally the value can be a string
     * @var null
     */
    private $_pw = null;
    
    /**
     * Stores the database name
     * @var string
     */
    private $_db = 'ramrodeal';
    
    /**
     * Stores the instance of PDO class
     * @var object
     */
    private $_pdo;
    
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
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    /**
     * Creates an instance of PDO class
     * Try/catch block is used to handle the possible error
     * 
     * @param object $pdo This pdo stores an object of PDO class
     */    
    public function __construct(){
        try{
            $this->_pdo = new PDO("mysql:host=$_host;dbname=$_db",$_username,$_pw);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Couldn\'t connect to database';
            echo '<p><strong>Message:</strong>'.$e-getMessage().'</p>';
        }
    }
}
?>