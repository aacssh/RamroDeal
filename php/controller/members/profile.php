<?php
require_once '../../init.php';

if(!$username = Input::get('user')){
    echo 'Khattam';
} else{
    $user = new User($username);
    if(!$user->exists()){
        Redirect::to(404);
    } else{
        unset($user->data()->password);
        unset($user->data()->salt);
        unset($user->data()->company);
        $data = $user->data();
    }
    ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");    //Displaying heading part of html
    nav($categorylist->data());  //Displaying navigation part of html
    $address = Address::getAddressInstance()->getAddress('city, district, country', array(
                    'where_clause' => array(
                        'address_id', '=', $data->address
                    )
                ));
    $info = array_merge((array)$user->data(), (array)$address->data());
    profile($info);   //Displaying profile
    ramrodeal_footer(); //Displaying footer of html
}
?>
