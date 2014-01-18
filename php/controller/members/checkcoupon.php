<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
$msg = '';
if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
      	$coupon = Coupon::getCouponInstance();
      	$deal_id = $deal->getSingleDeal(array(
      		'where_clause' => array(
      			'name','=', Input::get('deal_name')
      		)
      	));
      	if(!$deal_id){
      		$msg =  'Coupon is invalid or expired';
      	}else{
      		$_SESSION['coupon_data'] = Input::get('coupon_no');
      		$coupon_data = $coupon->getSingleCoupon(array(
	      		'where_clause' => array(
	      			array('coupon_no', '=', Input::get('coupon_no')),
	      			array('deal_id', '=', $deal_id->data()->deal_id)
	      		)
	      	));

	      	if(!$coupon_data){
	      		$msg =  'Coupon is invalid or expired';
	      	}else{
	      		if((strtotime('Y-m-d') >= strtotime($deal_id->data()->coupon_start_date)) && (strtotime('Y-m-d') <= strtotime($deal_id->data()->coupon_end_date))){
	      			$msg = 'true';
	      		}else{
	      			$msg = 'Coupon validity time is not met or it has been expired';
	      		}
	      	}
      	}
      } elseif(Input::get('confirm') === 'confirm'){
      		$coupon = Coupon::getCouponInstance();
      		$used = $coupon->updateStatus('coupon_no', $_SESSION['coupon_data'], array(
      				'status' => 1
      			)
      		);
      		unset($_SESSION['coupon_data']);
			
			if($used){
				Session::put('home', 'Confirmed');
				Redirect::to('members/checkcoupon.php');
			}
       }
   } else{
      die();
   }
}

$user_company = clone $user;
$user_company->getUsers('company', array(
	'where_clause' => array(
		'user_id', '=', $user->data()->user_id
	)
));
foreach ($user_company->data() as $value) {
	$company = $value->company;
}

$deal->getAllDeal(array(
	'where_clause' => array(
		array('company_id', '=', $company),
		array('status','=', 0)
	)
));

$category = $categorylist->getCategory();
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav($categorylist->data());  //Displaying navigation part of html
checkCoupon($deal->data(), $msg); //displaying add category form
ramrodeal_footer(); //Displaying footer of html
?>