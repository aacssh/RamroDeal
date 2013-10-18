<?php

abstract class Contacts
{
    protected $contact_no;
    protected $email;
    protected $type;
    protected $account;
    
    public function __construct($contact, $email, $type, Account $account){
        $this->contact_no = $contact;
        $this->email = $email;
        $this->type = $type;
        $this->account = $account;
    }
    
    public function getEmail(){
        return $this->account->email;
    }
    
    public function getContactNo(){
        return $this->account->contact_no;
    }
    
    public function getType(){
        return $this->account->type;
    }
    
    abstract public function getName();
}

?>