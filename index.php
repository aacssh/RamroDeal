<?php
include 'php/init.php';

$user = new User();
if($user->isLoggedIn()){
    if($user->hasPermission('admin')){
        Redirect::to('members/homepage_admin.php');
    }elseif($user->hasPermission('moderator')){
        Redirect::to('');
    } elseif($user->hasPermission('mer_admin')){
        Redirect::to('');
    } elseif($user->hasPermission('mer_moderator')){
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
    $list= Deal::getDealInstance()->getAllDeal();
    $deals_list = array();
    foreach($list as $deals){
        $img = Image::getImageInstance();
        $cover_list = $img->getImage($deals->image_id);
        $deals->cover = UPLOADPATH.$cover_list->cover_image;
        array_push($deals_list, $deals);
    }
    
    deallist($deals_list);
    ramrodeal_footer(); //footer of html
    }
?>