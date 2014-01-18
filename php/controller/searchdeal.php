<?php
include '../init.php';

ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
nav($categorylist->data());  //navigation part of html
$deal = Deal::getDealInstance();
$currentPage = Input::get('page');
$currentPage = empty($currentPage) ? 1 : $currentPage;
$perPage = 4;

if(Input::get('search')){
    $clean_search = str_replace(',', ' ', Input::get('search'));
    $search_words = explode(' ', $clean_search);
    $final_search_words = array();
    if(count($search_words) > 0){
        foreach ($search_words as $value) {
            if(!empty($value)){
                $final_search_words[] = $value;
            }
        }
    }

    $where_list = array();
    if(count($final_search_words) > 0){
        foreach ($final_search_words as$value) {
            $where_list[] ="name LIKE '%$value%'";
        }
    }
    $where_clause = implode(' OR ', $where_list);

    if(!empty($where_clause)){
        $search_query = $where_clause;
    }

    $totalCount = $deal->countAll(array(
        'search_clause' => array(
            'search' => $search_query
        ),
        'where_clause' => array()
    ));
    foreach($totalCount->data() as $count){
        $totalCount = $count;
    }
    if($totalCount > 0){
        $pagination = new Pagination($currentPage, $perPage, $totalCount);
        $deal->getAllDeal(array(
            'search_clause' => array(
                'search' => $search_query
            ),
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
    }else{
        Session::put('home', 'No such deals exist');
        Redirect::to('index.php');
    }
}
deallist($deals_list);
pagination($pagination);
ramrodeal_footer(); //footer of html
?>