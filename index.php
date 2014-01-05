<?php
include 'php/init_index.php';

$user = new User();
if($user->isLoggedIn()){
    if($user->hasPermission('admin')){
        Redirect::to('members/homepage_admin.php');
    }elseif($user->hasPermission('sub-admin')){
        Redirect::to('');
    } elseif($user->hasPermission('mer_admin')){
        Redirect::to('');
    } elseif($user->hasPermission('moderator')){
        Redirect::to('');
    } elseif($user->hasPermission('normal_user')){
        Redirect::to('');
    }
} else{
    ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
    nav();  //navigation part of html
    
    if(Session::exists('home')){
        echo '<p>'. Session::flash('home'). '</p>';
    }
    
    banner();   //banner part of html
    $deal = Deal::getDealInstance()->getAllDeal();
    $list = $deal->data();
    $deals_list = array();
    foreach($list as $deals){
        $img = Image::getImageInstance();
        $cover_list = $img->getCoverImage(array('image_id', '=', $deals->image_id));
        $deals->cover = UPLOADPATH.$cover_list->data()->cover_image;
        array_push($deals_list, $deals);
    }
    //echo '<pre>'.print_r($deals_list, true).'</pre>';
    deallist($deals_list);
    ramrodeal_footer(); //footer of html
    }
?>