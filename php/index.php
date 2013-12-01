<?php
include 'init.php';

//heading part of html
ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price");

//navigation part of html
nav();

//banner part of html
banner();

$list= Deal::getDealInstance()->getAllDeal();
$deals_list = array();
foreach($list as $deals){
   $img_id = array('image_id' => $deals->image_id);
   $img = Image::getImageInstance();
   $img->setProperty($img_id);
   $cover_list = $img->getImage();
   $cover = array();
   
   foreach($cover_list as $img){
       foreach($img as $image){
           $deals->cover = UPLOADPATH.$image;
       }
   }
   unset($deals->image_id);
   array_push($deals_list, $deals);
}
 
deallist($deals_list);

//footer of html
ramrodeal_footer();

?>