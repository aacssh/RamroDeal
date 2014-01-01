<?php
include '../init_index.php';

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
    
    $deals= Deal::getDealInstance()->getSingleDeal(array('name', '=', Input::get('deal')));
    $img = Image::getImageInstance();
    $allImageList = $img->getAllImage(array('image_id', '=', $deals->image_id));
    $company = Company::getCompanyInstance()->getSingleCompany(array('company_id', '=', $deals->company_id));
    $deals->company = $company->data()->name;
    $deals->cover = UPLOADPATH.$allImageList->cover_image;
    $deals->firstImage = UPLOADPATH.$allImageList->image1;
    $deals->secondImage = UPLOADPATH.$allImageList->image2;
    deals($deals);
    ramrodeal_footer(); //footer of html
    }
?>