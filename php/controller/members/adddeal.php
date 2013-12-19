<?php
include '../../init.php';

ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
adddeal(Category::getCategoryInstance()->getCategory()->data()); //displaying add category form
ramrodeal_footer(); //Displaying footer of html
?>