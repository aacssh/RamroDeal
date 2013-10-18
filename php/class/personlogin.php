<?php

    class PersonLogin extends Login
    {
        public function login(){
            return "{$this->username} "."{$this->password}";
        }
    }
?>