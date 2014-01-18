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
    private static $_dbinstance = null;
    
    /**
     * Stores the instance of PDO class
     * @var object
     */
    private $_db;
    
    /**
     * Stores the statement of PDO class
     * @var object
     */
    private $_query;
    
    private $_error = false,
            $_results,
            $_count = 0;
    
    /**
     * Creates and store an instance of Database class
     * Checks whether instance of Datbase class is already created
     * or not
     * if not created, it create a new instacne of Database class,
     * otherwise returns the previously created instance
     * 
     * @return  Object              an object to access other methods of class
     * @param   Object  $instance   This is static 
     */
    public static function getDBInstance(){
        if(!isset(self::$_dbinstance)){
            self::$_dbinstance = new Database();
        }
        return self::$_dbinstance;
    }
    
    /**
     * Creates an instance of PDO class
     * Try/catch block is used to handle the possible errors
     * 
     * @param       object    $pdo    This pdo stores an object of PDO class
     */    
    private function __construct(){
        try{
            $this->_db = new PDO('mysql:host='. Config::get('mysql/host') .';dbname='. Config::get('mysql/db') , Config::get('mysql/username'), Config::get('mysql/password'));
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die('<p><strong>Message:</strong>'.$e->getMessage().'</p>');
        }
    }
    
    /**
     * Performs SQL query with PDO::prepare function
     * @param       string      This parameter contains sql query
     */
    public function query($sql, $params = array()){
        $this->_error = false;
        try{
            if($this->_query = $this->_db->prepare($sql)){
                $x = 1;
                if(count($params)){
                    foreach($params as $param){
                        $this->bind($x, $param);
                        $x++;
                    }
                }

                if($this->_query->execute()){
                    $this->_count = $this->_query->rowCount();
                }else{
                    $this->_error = true;
                }
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $this;
    }
 
    /**
     * Performs binding of input parameters using PDO::bindValue() function.
     * switch statement is used to set the datatype of parameter
     * 
     * @param  string  $param  The placeholder value that will be used in SQL statement
     * @param  string  $value  The actual values that will be bind to the placeholder
     * @param  string  $type   The datatype of the parameter
     */
    private function bind($param, $value, $type = null){
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
                    break;
            }
        }
        $this->_query->bindValue($param, $value, $type);
    }
    
    private function action($action, $table, $clause = array()){
        $where_clause ='';
        $order_clause = '';
        $limit_clause = '';
        $search_clause = '';
        $i = 1;
        $values = array();
        if(!empty($clause)){
            foreach($clause as $rule => $item){
                switch($rule){
                    case 'limit_clause':
                        foreach($item as $type => $value){
                            $limit_clause .= ' '.$type.' '.$value;
                        }
                        break;
                    case 'order_clause':
                        if(is_array($item) && !empty($item)){
                            $order_clause = 'ORDER BY';
                            foreach($item as $value){
                                $order_clause .= ' '.$value;
                            }
                        }
                        break;
                    case 'search_clause':
                        if(is_array($item) && !empty($item)){
                            $search_clause = 'WHERE';
                            foreach($item as $value){
                                $search_clause .= ' '.$value;
                            }
                        }
                        break;
                    case 'where_clause':
                        if(!empty($item)){
                            $where_clause ='WHERE ';
                            if(is_array($item[$i])){
                                foreach($item as $where){
                                    if(count($where) === 3){
                                        $operators = array('=', '>', '<', '>=', '<=');
                            
                                        $field      = $where[0];
                                        $operator   = $where[1];
                                        $value      = $where[2];
                
                                        if(in_array($operator, $operators)){
                                            $where_clause .= "{$field} {$operator} ?";
                                            array_push($values, $value);
                                            
                                            if($i < count($item)){
                                                $where_clause .= ' AND ';
                                            }
                                        }
                                    }
                                    $i++;
                                }
                            } else{
                                if(count($item) === 3){
                                    $operators = array('=', '>', '<', '>=', '<=');
                        
                                    $field      = $item[0];
                                    $operator   = $item[1];
                                    $value      = $item[2];
                        
                                    if(in_array($operator, $operators)){
                                        $where_clause .= "{$field} {$operator} ?";
                                        array_push($values, $value);
                                    }
                                }
                            }

                            $sql = "{$action} FROM {$table} {$where_clause} {$search_clause} {$order_clause} {$limit_clause}";
                            if(!$this->query($sql, $values)->error()){
                                return $this;
                            }
                        }else{
                            $sql = "{$action} FROM {$table}  {$search_clause} {$order_clause} {$limit_clause}";
                
                            if(!$this->query($sql)){
                                return $this;
                            }
        }
                        break;
                }
            }
        }else{
            $sql = "{$action} FROM {$table}";

            if(!$this->query($sql)){
                return $this;
            }
        }
        return false;
    }
    
    public function get($table, $values, $clause = array()){
        $sql = 'SELECT '. $values;
        return $this->action($sql, $table, $clause);
    }
    
    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
    }
    
    public function insert($table, $fields = array()){
        if(count($fields)){
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            
            foreach($fields as $field){
                $values .= '?';
                
                if($x < count($fields)){
                    $values .= ', ';
                }
                $x++;
            }

            $sql = "INSERT INTO {$table} (`". implode('`, `', $keys) ."`) VALUES ({$values})";

            if(!$this->query($sql, $fields)->error()){
                return true;
            }
        }
        return false;
    }
    
    public function update($table = null, $field = null, $id = null, $fields = array()){
        $set = '';
        $x = 1;
        
        foreach($fields as $name => $value){
            $set .= "{$name} = ?";
            if($x < count($fields)){
                $set .= ', ';
            }
            $x++;
        }
        $sql = "UPDATE {$table} SET {$set} WHERE {$field} = '{$id}'";
        
        if(!$this->query($sql, $fields)->error()){
            return true;
        }
    }

    public function addDeal($query = null, $values = array(), $where){
        $this->_query = $this->_db->prepare($query);
        $x = 1;
        foreach ($values as $value) {
            $this->_query->bindValue($x, $value);
            $x++;
        }
        $this->_query->execute();
        return true;
    }
    
    public function results(){
        return $this->_results;
    }
    
    public function error(){
        return $this->_error;
    }
    
    public function count(){
        return $this->_count;
    }
    
    /**
     * Performs specific task using PDO::fetchAll() function
     * First, the execute() method is run
     * 
     * @return   array   result set of rows
     */
    public function fetchAll(){
        return $this->_query->fetchAll(PDO::FETCH_OBJ);
    }
    
    /**
     * Performs specific task using PDO::fetchAll() function
     * First, the execute() method is run
     * 
     * @return   array   result set of rows
     */
    public function fetchSingle(){
        return $this->_query->fetch(PDO::FETCH_OBJ);
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