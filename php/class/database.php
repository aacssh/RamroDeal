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
    private static $_dbinstance;
    
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
    private $_pw = 'gcespcm';
    
    /**
     * Stores the database name
     * @var string
     */
    private $_dbname = 'ramrodeal';
    
    /**
     * Stores the instance of PDO class
     * @var object
     */
    private $_db;
    
    /**
     * Stores the statement of PDO class
     * @var object
     */
    private $_stmt;
    
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
    public static function getDBInstance(){
        if(!isset(self::$_dbinstance)){
            self::$_dbinstance = new Database();
        }
        return self::$_dbinstance;
    }
    
    /**
     * Creates an instance of PDO class
     * Try/catch block is used to handle the possible error
     * 
     * @param object $pdo This pdo stores an object of PDO class
     */    
    private function __construct(){
        try{
            $this->_db = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname, $this->_username, $this->_pw);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            //echo die('Couldn\'t connect to databases');
            echo die('<p><strong>Message:</strong>'.$e->getMessage().'</p>');
        }
    }
    
    /**
     * Performs SQL query with PDO::prepare function
     * @param  string This parameter contains sql query
     */
    public function query($query){
        $this->stmt = $this->_db->prepare($query);
    }
    
    /**
     * Performs binding of input parameters using PDO::bindValue() function.
     * switch statement is used to set the datatype of parameter
     * 
     * @param  string  $param  The placeholder value that will be used in SQL statement
     * @param  string  $value  The actual values that will be bind to the placeholder
     * @param  string  $type   The datatype of the parameter
     */
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    /**
     * Performs execution of prepared statement using PDO::execute() function
     */
    public function execute(){
        return $this->stmt->execute();
    }
    
    /**
     * Performs specific task using PDO::fetchAll() function
     * First, the execute() method is run
     * 
     * @return   array   result set of rows
     */
    public function fetchAll(){
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Performs specific task using PDO::fetchAll() function
     * First, the execute() method is run
     * 
     * @return   array   result set of rows
     */
    public function fetchSingle(){
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Performs specific task of finding number of affected rows from previous
     * delete, insert and select statement using PDO::rowCount() function
     * 
     * @return   integer   Number of affected rows
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    /**
     * Begins a transcation with PDO::beginTranscation() function
     */
    public function beginTransaction(){
        return $this->_db->beginTransaction();
    }
    
    /**
     * Ends a transcation and commits the changes with
     * PDO::commit() function
     */
    public function endTransaction(){
        return $this->_db->commit();
    }
    
    /**
     * Cancels a transcation and roll backs the changes with
     * PDO::rollBack() function
     */
    public function cancelTransaction(){
        return $this->_db->rollBack();
    }
}
?>