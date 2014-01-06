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
    banner();   //banner part of html
    
    $deal = Deal::getDealInstance();
    $currentPage = Input::get('page');
    $currentPage = empty($currentPage) ? 1 : $currentPage;
    $perPage = 2;
    $totalCount = $deal->countAll();
    foreach($totalCount->data() as $count){
        $totalCount = $count;
    }
    $pagination = new Pagination($currentPage, $perPage, $totalCount);
    $deal->getAllDeal(array(
        'limit_clause' => array(
            'LIMIT' => $perPage,
            'OFFSET' => $pagination->offset()
        ),
        'where_clause' => array()
    ));
    $list = $deal->data();
    $deals_list = array();
    foreach($list as $deals){
        $img = Image::getImageInstance()->getCoverImage(array(
            'where_clause' => array(
                'image_id', '=', $deals->image_id
            )
        ));
        $deals->cover = UPLOADPATH.$img->data()->cover_image;
        array_push($deals_list, $deals);
    }
    deallist($deals_list);
    pagination($pagination);
    ramrodeal_footer(); //footer of html
    }
?>