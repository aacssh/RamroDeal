<?php
class Person
{
    protected $first_name;
    protected $last_name;
    protected $gender;
    
    public function __construct($fname, $lname, $gender){
        parent::__construct();
        $this->first_name = $fname;
        $this->last_name = $lname;
        $this->gender = $gender;
    }
    
    public function getName(){
        return $this->first_name.' '.$this->last_name;
    }
    
    public function getGender(){
        return $this->gender;
    }
    /*
    public function getBalance(Balance $balance){
        return $Balance->getDepositBalance();
    }*/
}

?>