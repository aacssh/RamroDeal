<?php
   // include('../session.php');
    include('../../view/fns.php');
 
   spl_autoload_register(function ($obj)
    {
        $class = strtolower($obj);
        include '../../class/'.$class.'.php';
    });
    
    
    //Displaying heading part of html
    ramrodeal_header("Sign Up : RamroDeal - Great Deal, Great Price");
    
    //Displaying navigation part of html
   nav();
    
    if (isset($_POST['submit'])){
        $filter = Validation::getValidationInstance();
        $type = $filter->filter($_POST['type']);
        $fname = $filter->filter($_POST['fname']);
        $lname = $filter->filter($_POST['lname']);
        $sex = $filter->filter($_POST['sex']);
        $email = $filter->filter($_POST['email']);
        $phoneno = $filter->filter($_POST['phoneno']);
        $city = $filter->filter($_POST['city']);
        $state = $filter->filter($_POST['state']);
        $country = $filter->filter($_POST['country']);
        $zip = $filter->filter($_POST['zip']);
        $address_id = '';
        
        $add = array(
            'city' => $city, 'state' => $state, 'country' => $country, 'zip' => $zip
        );
        
        try{
            $address = Address::getAddressInstance();
            $address->setProperty($add, Database::getDBInstance());
            $checkAddress = $address->checkAddress();
            foreach($checkAddress as $deal){
                foreach($deal as $list){
                   $address_id = $list;
                }
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }    
        
        if ($address_id == 0){
            echo 'Invalid address given';
        } else{
            try{
                $code = RandomCode::getRandomCodeInstance()->randCode(18);
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
    
            $args = array(
                  'type' => $type, 'firstname' => $fname, 'lastname' => $lname, 'gender' => $sex,
                  'email' => $email, 'phoneno' => $phoneno, 'address_id' => $address_id, 'code' => $code
                );
            
            $log = Log::getLogInstance();
            $log->setProperty($email, $code, Database::getDBInstance());
            
            try{
                $signup = Person::getPersonInstance();
                $signup->setProperty($args, Database::getDBInstance());
                $msg = $signup->addPerson(Log::getLogInstance());
                echo $msg;
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
    }
    
    //displaying add category form
    signUp();
    
    //Displaying footer of html
    ramrodeal_footer();
?>