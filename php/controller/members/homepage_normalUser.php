<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
nav($categorylist->data());  //navigation part of html
$deal = Deal::getDealInstance();
$currentPage = Input::get('page');
$currentPage = empty($currentPage) ? 1 : $currentPage;
$perPage = 4;

if(Input::get('category')){
    $selected_category = clone $categorylist;
    $category_id = $selected_category->getSingleId(array(
        'where_clause' => array(
            'name', '=', Input::get('category')
        )
    ));

    $totalCount = $deal->countAll(array(
        'where_clause' => array(
            'category_id', '=', $selected_category->data()->category_id
        ),
    ));
    foreach($totalCount->data() as $count){
        $totalCount = $count;
    }
    $pagination = new Pagination($currentPage, $perPage, $totalCount);
    $deal->getAllDeal(array(
        'limit_clause' => array(
            'LIMIT' => $perPage,
            'OFFSET' => $pagination->offset()
        ),
        'where_clause' => array(
            array('category_id', '=',  $selected_category->data()->category_id),
            array('status', '=',  0)
        )
    ));
}elseif(Input::get('deal') == 'top'){
    $totalCount = $deal->countAll(array(
        'where_clause' => array(
            'status', '=', 0
        )
    ));
    foreach($totalCount->data() as $count){
        $totalCount = $count;
    }
    $pagination = new Pagination($currentPage, $perPage, $totalCount);
    $deal->getAllDeal(array(
        'limit_clause' => array(
            'LIMIT' => $perPage,
            'OFFSET' => $pagination->offset()
        ),
        'where_clause' => array(
            'status', '=',  0
        ),
        'order_clause' => array(
            'order by' => 'total_people',
            'order' => 'DESC'
        )
    ));
}else{
    if(Input::get('cancel') == 'paypal'){
        if(Input::get('token')){
            echo '<div class="alert alert-success text-center">Transaction cancelled</div>';
        }

    }
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
        'where_clause' => array(
            'status', '=',  0
        )
    ));
}
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
?>