<?php
include '../init.php';

$msg = '';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = Validate::getValidateInstance();
        $validation = $validate->check($_POST, array(
            'email' => array(
                'required' => true,
            ),
            'password' => array(
                'required' => true,
                'min' => 6
            )
        ));
        
        if($validation->passed()){
            //user log in
            $user = User::getUserInstance();
            
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('email'), Input::get('password'), $remember);
            
            if($login){
                Redirect::to('index.php');
                switch($_SESSION['type']){
                    case 'administrator':
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin/adminHomepage.php';
                        header('Location: ' . $home_url);('Location: ' . $home_url);
                        break;
                    
                    case 'sub-administrator':
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin/subAdminHomepage.php';
                        header('Location: ' . $home_url);('Location: ' . $home_url);
                        break;
                    
                    case 'merchant':
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/merchant/merchantHomepage.php';
                        header('Location: ' . $home_url);('Location: ' . $home_url);
                        break;
                    
                    case 'agent':
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/agent/agentHomepage.php';
                        header('Location: ' . $home_url);('Location: ' . $home_url);
                        break;
                    
                    default:
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/customer/customerHomepage.php';
                        header('Location: ' . $home_url);('Location: ' . $home_url);
                }
            } else{
                $msg = '<p>Incorrect email or password.</p>';
            }
            
        } else{
            foreach($validation->errors() as $error){
                $msg = $error.'<br />';
            }
        }
    }
}

//Displaying heading part of html
ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");

//Displaying navigation part of html
nav();

//Displaying login form
login_form();
echo $msg;

//Displaying footer of html
ramrodeal_footer();

?>
