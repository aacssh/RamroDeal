<?php

class Email{
	private $_host = 'smtp.sendgrid.net';
	private $_port = 587;
	private $_username = 'iat';
	private $_password = 'Barracuda01';
	private $_from = 'aashish.ghale@gmail.com';
	private $_mail;

	public function __construct(){
		/*
		$this->includes();
		$this->_mail = new PHPMailer(); // create a new object
		*/
	}

	private function includes(){
		require_once('../../includes/PHPMailer/class.phpmailer.php');
		require_once('../../includes/PHPMailer/class.smtp.php');
		require_once('../../includes/PHPMailer/class.phpmailer.php');
	}

	protected function setConfig(){
		$this->includes();
		$this->_mail = new PHPMailer();
		$this->_mail->IsSMTP(); // enable SMTP
		$this->_mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$this->_mail->SMTPAuth = true; // authentication enabled
		$this->_mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$this->_mail->Host = $this->_host;
		$this->_mail->Port = $this->_port;
		$this->_mail->IsHTML(true);
		$this->_mail->Username = $this->_username;
		$this->_mail->Password = $this->_password;
	}

	public function welcomeMail($name = null, $password = null, $email = null){
		echo $name.'<br>';
		echo $password.'<br>';
		echo $email.'<br>';
		$this->includes();
		$this->_mail = new PHPMailer();
		$this->_mail->IsSMTP(); // enable SMTP
		$this->_mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$this->_mail->SMTPAuth = true; // authentication enabled
		$this->_mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$this->_mail->Host = $this->_host;
		$this->_mail->Port = $this->_port;
		$this->_mail->IsHTML(true);
		$this->_mail->Username = $this->_username;
		$this->_mail->Password = $this->_password;
		$this->_body = "
		<html>
			<body>
			<p style='background-color: blue;'><img src='http://meadhikari.insomnia247.nl/ramrodeal_icon.png' style='width:35em; height:10em;' /></p><br /><br />
			<h1>Welcome to RamroDeal <i>{$name}!!! </i></h1>
			<p>Your password is: <em>{$password}</em></p>
			<p>Explore the great quality deals in unbelieveable price</p>
			</body>
		</html>
		";
		$this->_mail->AddAddress($email);
 		if($this->_mail->Send()){
	    	return true;
	    }
	    return false;
	    /*
		if($this->sendMail($email)){
			return true;
		}
		return false;
		*/
	}

	public function forgotPassword($value = null, $email = null){
		echo '<br>'.$value.'<br>';
		echo $email.'<br>';
		$this->includes();
		$this->_mail = new PHPMailer();
		$this->_mail->IsSMTP(); // enable SMTP
		$this->_mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
		$this->_mail->SMTPAuth = true; // authentication enabled
		$this->_mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
		$this->_mail->Host = $this->_host;
		$this->_mail->Port = $this->_port;
		$this->_mail->IsHTML(true);
		$this->_mail->Username = $this->_username;
		$this->_mail->Password = $this->_password;
		$this->_body = "
		<html>
			<body>
			<p style='background-color: blue;'><img src='http://meadhikari.insomnia247.nl/ramrodeal_icon.png' style='width:35em; height:10em;' /></p><br /><br />
			<h1>Your new password is {$value} </i></h1>
			<p>Do not forget to change the password after logging in</p>
			</body>
		</html>
		";
		$this->_mail->AddAddress($email);
 		if($this->_mail->Send()){
	    	return true;
	    }
	    return false;
	    /*
		if($this->sendMail($email)){
			return true;
		}
		return false;
		*/
	}

	private function sendMail($email=''){
		$this->_mail->AddAddress($email);
 		if($this->_mail->Send()){
	    	return true;
	    }
	    return false;
	}
}

/*
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.sendgrid.net";
$mail->Port = 587; // or 587
$mail->IsHTML(true);
$mail->Username = "iat";
$mail->Password = "Barracuda01";
$mail->SetFrom("aacssh@hotmail.com");
$mail->Subject = "BigFoot softwares";
$mail->Body = <<<EOF
	<html>
		<body>
		<p><img src="http://meadhikari.insomnia247.nl/ramrodeal_icon.png" style="width:35em; height:10em;" /></p><br /><br />
		<p><h2>Welcom to RamroDeal<b></h2>

		<p><i>My name is Ghale and I'm awesome</i></p>

		</body>
	</html>
EOF;
$mail->AddAddress("aashish.ghale@gmail.com");
 if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
    echo "Message has been sent";
    }
*/
