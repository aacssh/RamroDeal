<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
$msg = '';
$coupon = Coupon::getCouponInstance();
$coupon->getAllData(array(
	'where_clause' => array(
		'user_id', '=', $user->data()->user_id
	)
));

$coupon_details = $coupon->data();
$i = 0;
$deal_details = array();
foreach ($coupon->data() as $value) {
	$deal->getSingleDeal(array(
		'where_clause' => array(
			'deal_id', '=', $value->deal_id
		)
	));
	$coupon_data = (array)$deal->data();
	$coupon_data['coupon_no'] = $value->coupon_no;
	$coupon_data['purchase_date'] = $value->date;
	array_push($deal_details, (object)$coupon_data);
	$i++;
}

$category = $categorylist->getCategory();
ramrodeal_header("RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
nav($categorylist->data());  //Displaying navigation part of html
couponList($deal_details); //displaying add category form
ramrodeal_footer(); //Displaying footer of html
?>