<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}

$deal->getAllDeal(array(
	'where_clause' => array(
		'company_id', '=', $user->data()->company
	)
));
$data = $deal->data();
if(Input::exists('get')){
	if(Input::get('type')){
		if(Input::get('type') === 'purchased'){
			$select = $deal->getAllDeal(array(
				'where_clause' => array(
					array('status', '=', 2),
					array('company_id', '=', $user->data()->company)
				)
			));
			if(!$select){
				$data = null;
			}
		}elseif(Input::get('type') === 'expired'){
			$select = $deal->getAllDeal(array(
				'where_clause' => array(
					array('status', '=',1),
					array('company_id', '=', $user->data()->company)
				)
			));
			if(!$select){
				$data = null;
			}
		}
	}
}

ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html
totalcoupon($data);
ramrodeal_footer(); //Displaying footer of html
?>