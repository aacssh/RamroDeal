<?php
   // include('../session.php');
    include('../../view/fns.php');
 
    spl_autoload_register(function ($obj)
    {
        $class = strtolower($obj);
        include '../../class/'.$class.'.php';
    });
    
    
    //Displaying heading part of html
    ramrodeal_header("RamroDeal - Great Deal, Great Price");
    
    //Displaying navigation part of html
    //nav();

    $company = Company::getCompanyInstance();
    $company->setProperty(array(), Database::getDBInstance());
    $list = $company->getCompany();
    
    companyList($list);
    
    //Displaying footer of html
    ramrodeal_footer();

?>