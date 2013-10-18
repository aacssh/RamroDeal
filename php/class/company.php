<?php
class Company
{
    protected $name;
    protected $office_no;
    
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
    public function getCategory(Category $category){
        return $Category->
    }*/
}
?>