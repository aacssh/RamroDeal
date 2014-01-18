<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
$coupon = Coupon::getCouponInstance();
$deal_id = $deal->getAllDeal(array(
    'where_clause' => array(
        'company_id','=', $user->data()->company
    )
));

if(!$deal_id){
    $msg =  'You don\'t own any deal';
}else{
    $i = 0;
    $customer_details = array();
    foreach ($deal->data() as $deal_value) {
        $coupon_data = $coupon->getAllData(array(
            'where_clause' => array(
                'deal_id', '=', $deal_value->deal_id
            )
        ));

        foreach ($coupon->data() as $coupon_value) {
            $my_user = clone $user;
            $my_user->getUsers('username, first_name, last_name', array(
                'where_clause' => array(
                    'user_id', '=', $coupon_value->user_id
                )
            ));
            foreach ($my_user->data() as $user_value) {
                array_push($customer_details, (object)array(
                    'coupon_date' => $coupon_value->date,
                    'deal_name' => $deal_value->name,
                    'username' => $user_value->username,
                    'first_name' => $user_value->first_name,
                    'last_name' => $user_value->last_name
                ));
            }
        }
    }
}

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
transaction($customer_details);;
//pagination($pagination);
ramrodeal_footer(); //Displaying footer of html
?>
