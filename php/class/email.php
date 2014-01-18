<?php

class Email{
	private $_host = 'smtp.sendgrid.net';
	private $_port = 587;
	private $_username = 'iat';
	private $_password = 'Barracuda01';
	private $_from = 'aashish.ghale@gmail.com';
	private $_mail;

	public function __construct(){
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

	<?php
require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');
require_once('PHPMailer/class.phpmailer.php');

function forgotPassword($email = null, $password = null){
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
	$mail->SetFrom("support@ramrodeal.com");
	$mail->Subject = 'Your password has been changed';
	$mail->Body = <<<EOF
		<html>
			<body>
				<p><img src="http://meadhikari.insomnia247.nl/ramrodeal_icon.png" style="width:35em; height:10em;" /></p><br /><br />
				<h2><p>Your password is: <strong><em>{$password}</em></strong></p></h2>
				<p><em><strong>Do not forget to change the password</strong></em></p>
			</body>
			<address>
				Written by <a href="ramrodeal.com">RamroDeal Team</a>.<br> 
				Visit us at:<br>
				ramrodeal.com<br>
				Lamachaur, Pokhara<br>
				Nepal
			</address>
		</html>
EOF;
	$mail->AddAddress($email);
	 if(!$mail->Send())
	    {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	    }
	    	return false;
	    {
	    	return true;
	    }
}

function welcomeMail($email = null, $password = null, $name = null){
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
	$mail->SetFrom("support@ramrodeal.com");
	$mail->Subject = "Welcome to RamroDeal";
	$mail->Body = <<<EOF
		<html>
			<body>
				<p><img src="http://meadhikari.insomnia247.nl/ramrodeal_icon.png" style="width:35em; height:10em;" /></p><br /><br />
				<h1>Welcome to RamroDeal, {$name}</h1>
				<h3>explore the quality deals in great price</h3>
				<p>Your password is: <strong><em>{$password}</em></strong></p>
				<p><em><strong>Do not forget to change the password</strong></em></p>
				<address>
					Written by <a href="ramrodeal.com">RamroDeal</a>.<br> 
					Visit us at:<br>
					ramrodeal.com<br>
					Lamachaur, Pokhara<br>
					Nepal
				</address>
			</body>
		</html>
EOF;
	$mail->AddAddress($email);
	 if(!$mail->Send())
    {
    	echo "Mailer Error: " . $mail->ErrorInfo;
    }
    	return false;
    {
    	return true;
    }
}

function couponMail($email = null, $coupon = null, $itemname = null, $itemprice = null){
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
	$mail->SetFrom("support@ramrodeal.com");
	$mail->Subject = "Welcome to RamroDeal";
	$mail->Body = <<<EOF
		<html>
			<body>
				<p><img src="http://meadhikari.insomnia247.nl/ramrodeal_icon.png" style="width:35em; height:10em;" /></p><br /><br />
				<h1>Thank you for buying</i></h1>
				<h2>Purchase Details:</h2>
				<p>Your coupon: $coupon</p>
				<p>Item Name: $itemname</p>
				<p>Item Price: $itemprice</p>
				<p><em><strong>Remember to use your coupon within the specified time period mentioned by the merchant.</strong></em></p>
				<p><em><strong>RamroDeal won\'t be responsible for expired coupon.</strong></em></p>
				<p><b>Thank you</b></p>
				<address>
					Written by <a href="ramrodeal.com">RamroDeal</a>.<br> 
					Visit us at:<br>
					ramrodeal.com<br>
					Lamachaur, Pokhara<br>
					Nepal
				</address>
			</body>
		</html>
EOF;
	$mail->AddAddress($email);
	 if(!$mail->Send())
	    {
	    	echo "Mailer Error: " . $mail->ErrorInfo;
	    }
	    	return false;
	    {
	    	return true;
	    }

}



//sendMail("dealramro@gmail.com", "Your password has been changed", "Aashish Ghale", "123456");

?>


}