<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
$company = Company::getCompanyInstance();
if(Input::exists()){
    $db = Database::getDBInstance();
    $company->getId(array(
        'where_clause' => array(
            'name', '=', Input::get('company_name')
        )
    ));
    $id = $company->data();

    if(Input::get('delete') != ''){
        $user = new User();
        try{
            $db->beginTransaction();
            $user->delete(array(
                'where_clause' => array(
                    'company', '=', $id[0]->company_id
                )
            ));
            $company->deleteCompany($id[0]->company_id);

            if(deleteMail(Input::get('email'), Input::get('fname').' '.Input::get('lname'))){
                Session::flash('home', Input::get('company_name'). ' company has been deleted!');
            }else{
                Session::flash('home', 'New company has been added.');
            }
            
            $db->endTransaction();
        } catch(PDOException $e){
            $db->cancelTransaction();
            die($e->getMessage());
        }
    }
}

$list = $company->getAllCompany('name, email');
//$companies = array();
/*foreach($list->data() as $datalist){
    foreach($datalist as $data){
        array_push($companies, $data);
    }
}*/

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
companyList($list->data());
ramrodeal_footer(); //Displaying footer of html
?>