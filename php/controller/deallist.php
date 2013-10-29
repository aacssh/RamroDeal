<?php
include_once('../view/fns.php');

spl_autoload_register(function ($obj)
{
    $class = strtolower($obj);
    include '../class/'.$class.'.php';
});

//Displaying heading part of html
ramrodeal_header("Login - RamroDeal - Great Deal, Great Price");

//Displaying navigation part of html
nav();

 $db = Database::getDBInstance();
 $deallist = Deal::getDealInstance();
 $deallist->setProperty(array(), $db);
 $list= $deallist->getAllDeal();
 
 $deals_list = array();
 foreach($list as $deals){
    $img_id = array('image_id' => $deals['image_id']);
    $img = Image::getImageInstance();
    $img->setProperty($img_id, $db);
    $cover_list = $img->getImage();
    $cover = array();
    
    foreach($cover_list as $img){
        foreach($img as $image){
            $deals['cover'] = UPLOADPATH.$image;
        }
    }
    unset($deals['image_id']);
    array_push($deals_list, $deals);
    
 }
 
 deallist($deals_list);

//Displaying footer of html
ramrodeal_footer();

?>
