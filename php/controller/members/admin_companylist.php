<?php
    include '../../init.php';
    
    ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
    nav(); //Displaying navigation part of html

    $company = Company::getCompanyInstance();
    $company->setProperty(array(), Database::getDBInstance());
    $list = $company->getCompany();
    
    companyList($list);
    ramrodeal_footer(); //Displaying footer of html

?>