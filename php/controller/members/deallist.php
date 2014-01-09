<?php
include '../../init.php';

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

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
deallist($deals_list); //displaying list of deals
pagination($pagination);
ramrodeal_footer(); //Displaying footer of html
?>
