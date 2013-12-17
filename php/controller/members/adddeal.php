<?php
include '../../init.php';

$deals_list = array();
foreach(Deal::getDealInstance()->getAllDeal() as $deals){
    $img = Image::getImageInstance();
    $cover_list = $img->getImage($deals->image_id);
    $deals->cover = UPLOADPATH.$cover_list->cover_image;
    array_push($deals_list, $deals);
}

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
adddeal(Category::getCategoryInstance()->getCategory()->data()); //displaying add category form
deallist($deals_list);
ramrodeal_footer(); //Displaying footer of html
?>