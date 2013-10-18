<?php
	abstract class Login
	{
		protected $username;
		protected $password;
		
		public function __construct($name, $pw){
			$this->username = $name;
			$this->password = $pw;
		}
		
		public static function create($name, $pw){
			return new static($name, $pw);
		}
		
		abstract public function login();
	}
	
	class PersonLogin extends Login
	{
		public function login(){
			return "{$this->username} "."{$this->password}";
		}
	}
	
	class CompanyLogin extends Login
	{
		public function login(){
			return "{$this->username} "."{$this->password}";
		}
	}
	
	$plogin = PersonLogin::create('aacssh','######');
	echo $plogin->login();
	
	$clogin = CompanyLogin::create('aakash','######');
	echo $clogin->login();
	
?>