<?php
   // include('../session.php');
    include('../../view/fns.php');
 
    function __autoload($obj){
        $class = strtolower($obj);
        include '../../class/'.$class.'.php';
    }
    
    
    //Displaying heading part of html
    ramrodeal_header("RamroDeal - Great Deal, Great Price");
    
    //Displaying navigation part of html
   // nav();
    
    //displaying add category form
    addCompany();
    
    if (isset($_POST['submit'])){
        $filter = Validation::getValidationInstance();
        $type = $filter->filter($_POST['type']);
        $name = $filter->filter($_POST['name']);
        $email = $filter->filter($_POST['email']);
        $phoneno = $filter->filter($_POST['phoneno']);
        $mobileno = $filter->filter($_POST['mobileno']);
        $city = $filter->filter($_POST['city']);
        $state = $filter->filter($_POST['state']);
        $country = $filter->filter($_POST['country']);
        $zip = $filter->filter($_POST['zip']);
        
        $add = array(
            'city' => $city, 'state' => $state, 'country' => $country, 'zip' => $zip
        );
        
        try{
            $address = Address::getAddressInstance($add, Database::getDBInstance());
            $checkAddress = $address->checkAddress();
            foreach($checkAddress as $deal){
                foreach($deal as $list){
                   echo" <tr>
                        <td>$list</td>
                    </tr>";
                }
            }
            /*
            if ($checkAddress){
                $code = RandomCode::getRandomCodeInstance()->randCode(18);
                $args = array(
                      'type' => $type, 'name' => $name, 'email' => $email, 'phoneno' => $phoneno,
                      'mobileno' => $mobileno, 'code' => $code
                    );
                try{
                    $dealcategory = Company::getCompanyInstance($args, Database::getDBInstance());
                    $msg = $dealcategory->addCompany();
                    echo $msg;
                } catch(Exception $e){
                    echo $e->getMessage();
                }
                echo $code;
            }else
                echo 'Invalid Address';
            */    
        } catch(Exception $e){
            echo $e->getMessage();
        }
/*
        */
    }
    
    //Displaying footer of html
    ramrodeal_footer();

?>