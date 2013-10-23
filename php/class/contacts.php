<?php

abstract class Contacts
{
    protected $_contact_no;
    protected $_email;
    protected $_type;
    protected $_account;
    
    protected function __construct($contact, $email, $type, Account $account){
        $this->_contact_no = $contact;
        $this->_email = $email;
        $this->_type = $type;
        $this->_account = $account;
    }
    
    public function getEmail(){
        return $this->_account->email;
    }
    
    public function getContactNo(){
        return $this->_account->contact_no;
    }
    
    public function getType(){
        return $this->_account->type;
    }
    
    abstract public function getName();
}

?>