<?php
include '../../init.php';

$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}

if(Input::exists('get')){
    $token = $_GET["token"];
    $playerid = $_GET["PayerID"];

    $ItemPrice      = $_SESSION['itemprice'];
    $ItemTotalPrice = $_SESSION['totalamount'];
    $ItemName       = $_SESSION['itemName'];
    $ItemNumber     = $_SESSION['itemNo'];
    $ItemQTY        = $_SESSION['itemQTY'];
    $deal_id 		= $_SESSION['deal_id'];

	$padata = '&TOKEN='.urlencode($token).
	            '&PAYERID='.urlencode($playerid).
	            '&PAYMENTACTION='.urlencode("SALE").
	            '&AMT='.urlencode($ItemTotalPrice).
	            '&CURRENCYCODE='.urlencode($PayPalCurrencyCode);

    $paypal= new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	$categorylist = Category::getCategoryInstance();
	$categorylist->getCategory();
    $msg = array();
    ramrodeal_header();
    nav($categorylist->data());

    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
        $msg[] = 'Your Transaction ID :'.urldecode($httpParsedResponseAr["TRANSACTIONID"]);

        if('Completed' == $httpParsedResponseAr["PAYMENTSTATUS"]){
            $msg[] = 'Payment Received! Your product will be sent to you very soon!';
        }elseif('Pending' == $httpParsedResponseAr["PAYMENTSTATUS"]){
            $msg[] = 'Transaction Complete, but payment is still pending! You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a>';
        }

        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
            $user = new User();
            $deal = Deal::getDealInstance();
            $coupon = Coupon::getCouponInstance();
            $coupon_code = RandomCode::randCode(10);
            $coupon->add(array(
            	'coupon_no' => $coupon_code,
            	'deal_id' => $deal_id,
            	'user_id' => $user->data()->user_id
            ));
            $deal->getNoOfPeople(array(
            	'where_clause' => array(
            		'deal_id', '=', $deal_id
            	)
            ));
            $deal->updateNoOfPeople('deal_id', $deal_id, array(
            		'total_people' => ($deal->data()->total_people + 1)
            ));

            success($msg);
            Session::delete('itemprice');
            Session::delete('totalamount');
            Session::delete('itemName');
            Session::delete('itemNo');
            Session::delete('itemQTY');
            Session::delete('deal_id');
/*
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';
*/
        } else  {
            echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
            echo '<pre>';
            print_r($httpParsedResponseAr);
            echo '</pre>';
        }
    }else{
        echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
        echo '<pre>';
        print_r($httpParsedResponseAr);
        echo '</pre>';
    }
    ramrodeal_footer();
}