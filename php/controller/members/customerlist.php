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
            Session::flash('home', Input::get('company_name'). ' company has been deleted!');
            $db->endTransaction();
        } catch(PDOException $e){
            $db->cancelTransaction();
            die($e->getMessage());
        }
    }
}
$user = new User();
$list = $user->getUsers('user_id,username, first_name, last_name, gender, contact_no, email, join_date', array(
        'where_clause' => array(
            'groups','=', 3
        )
));
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav(); //Displaying navigation part of html
customer_list($user->data());
ramrodeal_footer(); //Displaying footer of html
?>