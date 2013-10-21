<?php
    //include('../session.php');
    include('../../view/fns.php');
 
    function __autoload($obj){
        $class = strtolower($obj);
        include '../../class/'.$class.'.php';
    }
    
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
    
    //foreach($deallist as $deal=>$value){
        var_dump($deallist);
        echo '<br />';
        print_r($deallist);
        //echo $deal.$value;
    //}

?>