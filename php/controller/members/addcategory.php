<?php
include '../../init.php';

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
               $category->addCategory(array(
                    'name' => Input::get('name')
               ));
               Session::flash('home', 'New category has been added!');
            }catch (Exception $e){
               die($e->getMessage());
            }
         } else{
            foreach($validation->errors() as $error){
               Session::flash('home', $error.'<br />');
            }
         }
      }
   } else{
      die();
   }
}

$category = $categorylist->getCategory();
ramrodeal_header("RamroDeal - Great Deal, Great Price"); //Displaying heading part of html
nav(); //Displaying navigation part of html
addCategory(); //displaying add category form
categoryTable($category->data());
ramrodeal_footer(); //Displaying footer of html
?>