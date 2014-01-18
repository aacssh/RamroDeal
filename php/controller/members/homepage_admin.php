<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}

$deal->getAllDeal();
if(Input::exists('get')){
	if(Input::get('type')){
		if(Input::get('type') === 'purchased'){
			$deal->getAllDeal(array(
				'where_clause' => array(
					'status', '=', 2
				)
			));
		}elseif(Input::get('type') === 'expired'){
			$deal->getAllDeal(array(
				'where_clause' => array(
					'status', '=', 1
				)
			));
		}
	}
}

//echo '<pre>'.print_r($deal->data(), true).'</pre>';
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav();  //Displaying navigation part of html
totalcoupon($deal->data());
ramrodeal_footer(); //Displaying footer of html
?>