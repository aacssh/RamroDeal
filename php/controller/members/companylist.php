<?php
    include '../../init.php';
    
    $company = Company::getCompanyInstance();
    $list = $company->getCompany();
    $companies = array();
    foreach($list->data() as $datalist){
        foreach($datalist as $data){
            array_push($companies, $data);
        }
    }
    
    ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
    nav(); //Displaying navigation part of html
    companyList($companies);
    ramrodeal_footer(); //Displaying footer of html
?>