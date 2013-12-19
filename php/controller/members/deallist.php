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
deallist($deals_list); //displaying list of deals
ramrodeal_footer(); //Displaying footer of html
?>
