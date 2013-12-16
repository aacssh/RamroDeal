<?php
include '../../init.php';

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
addCategory(); //displaying add category form
$dealcategory = Category::getCategoryInstance(Database::getDBInstance());

if (isset($_POST['submit'])){
    $filter = Validation::getValidationInstance();
    $name = $filter->filter($_POST['name']);

    $dealcategory->setProperty($name);
    $msg = $dealcategory->addCategory();
    echo $msg;
}

$deallist = $dealcategory->getCategory();
categoryTable($deallist);
ramrodeal_footer(); //Displaying footer of html
?>