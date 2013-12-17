<?php
include '../../init.php';

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
addCategory(); //displaying add category form
$dealcategory = Category::getCategoryInstance();

if (isset($_POST['submit'])){
    $name = Validation::getValidationInstance()->filter($_POST['name']);

    $dealcategory->setProperty($name);
    $msg = $dealcategory->addCategory();
    echo $msg;
}

$categorylist = $dealcategory->getCategory();
categoryTable($categorylist->data());
ramrodeal_footer(); //Displaying footer of html
?>