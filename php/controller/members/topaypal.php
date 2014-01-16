<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
if(Input::exists()){
    $ItemName = Input::get('itemname');
    $ItemPrice = Input::get('itemprice');
    $ItemNumber = Input::get('itemnumber');
    $deal_id = Input::get('deal_id');
    $ItemQty = 1;
    $ItemTotalPrice = ($ItemPrice*$ItemQty);

    $padata =   '&CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&PAYMENTACTION=Sale'.
                '&ALLOWNOTE=1'.
                '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
                '&PAYMENTREQUEST_0_AMT='.urlencode($ItemTotalPrice).
                '&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
                '&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
                '&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
                '&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
                '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
                '&AMT='.urlencode($ItemTotalPrice).
                '&RETURNURL='.urlencode($PayPalReturnURL ).
                '&CANCELURL='.urlencode($PayPalCancelURL);

    $paypal= new MyPayPal();
    $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

    if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){
        $_SESSION['itemprice'] =  $ItemPrice;
        $_SESSION['totalamount'] = $ItemTotalPrice;
        $_SESSION['itemName'] =  $ItemName;
        $_SESSION['itemNo'] =  $ItemNumber;
        $_SESSION['itemQTY'] =  $ItemQty;
        $_SESSION['deal_id'] = $deal_id;

        if($PayPalMode =='sandbox'){
            $paypalmode = '.sandbox';
        }else{
            $paypalmode = '';
        }

        $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
        header('Location: '.$paypalurl);
    }else{
        echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
        echo '<pre>';
        print_r($httpParsedResponseAr);
        echo '</pre>';
    }
}
?>