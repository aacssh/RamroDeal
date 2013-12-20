<?php
include '../../init.php';

$company = Company::getCompanyInstance();

if(Input::exists()){
    $db = Database::getDBInstance();
    $company->getCompanyId(array('name', '=', Input::get('company_name')));
    $id = $company->data();
    
    if(Input::get('delete') != ''){
        $user = new User();
        try{
            $db->beginTransaction();
            $user->delete($id[0]->company_id);
            $company->deleteCompany($id[0]->company_id);
            Session::flash('home', 'New company has been deleted!');
            $db->endTransaction();
        } catch(PDOException $e){
            $db->cancelTransaction();
            die($e->getMessage());
        }
    } elseif(Input::get('change_pw') != ''){
        Redirect::to('members/update.php', 'company_id='.Input::get($id[0]->company_id));
    }
}

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