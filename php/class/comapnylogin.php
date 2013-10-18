<?php
    class CompanyLogin extends Login
    {
        public function login(){
            return "{$this->username} "."{$this->password}";
        }
    }
?>