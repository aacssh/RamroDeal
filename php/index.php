<?php
include 'init.php';

ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
nav();  //navigation part of html
banner();   //banner part of html

$list= Deal::getDealInstance()->getAllDeal();
$deals_list = array();
foreach($list as $deals){
    $img = Image::getImageInstance();
    $cover_list = $img->getImage($deals->image_id);
    $deals->cover = UPLOADPATH.$cover_list->cover_image;
    echo $cover_list->cover_image;
    array_push($deals_list, $deals);
    echo '<br><pre>'. print_r($deals_list, true) .'</pre><br>';
}

deallist($deals_list);
ramrodeal_footer(); //footer of html
?>