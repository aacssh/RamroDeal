<?php
    include '../../init.php';

    //Displaying heading part of html
    ramrodeal_header("RamroDeal - Great Deal, Great Price");
    
    //Displaying navigation part of html
    nav();
    
    //displaying add category form
    addCategory();
    
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
    
    //Displaying footer of html
    ramrodeal_footer();
?>