<?php
include '../../init.php';

$category = Category::getCategoryInstance();
if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
         $validate = Validate::getValidateInstance();
         $validation = $validate->check($_POST, array(
            'name' => array(
               'required' => true,
               'min' => 4
            )
         ));
         
         if($validation->passed()){
            try{
               $category->addCategory('category', array(
                    'name' => Input::get('name')
               ));
               Session::flash('home', 'New category has been added!');
            }catch (Exception $e){
               die($e->getMessage());
            }
         } else{
            foreach($validation->errors() as $error){
               $msg = $error.'<br />';
            }
         }
      }
   } else{
      die();
   }
}

$categorylist = $category->getCategory();
ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
addCategory(); //displaying add category form
categoryTable($categorylist->data());
ramrodeal_footer(); //Displaying footer of html
?>