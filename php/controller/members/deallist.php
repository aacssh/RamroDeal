<?php
include '../../init.php';

$deal = Deal::getDealInstance()->getAllDeal();
   $list = $deal->data();
   $deals_list = array();
   foreach($list as $deals){
      $img = Image::getImageInstance();
      $cover_list = $img->getCoverImage(array('image_id', '=', $deals->image_id));
      $deals->cover = UPLOADPATH.$cover_list->data()->cover_image;
      array_push($deals_list, $deals);
   }

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
deallist($deals_list); //displaying list of deals
ramrodeal_footer(); //Displaying footer of html
?>
