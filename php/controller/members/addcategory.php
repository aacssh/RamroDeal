<?php
include '../../init.php';
$user = new User();
if(!$user->isLoggedIn()){
   Redirect::to('index.php');
}
if(Input::exists()){
   if(Input::get('hide') === ''){
      if(Token::check(Input::get('token'))){
         $validate = Validate::getValidateInstance();
         $validation = $validate->check($_POST, array(
            'category' => array(
               'required' => true,
               'min' => 4
            )
         ));
         
         if($validation->passed()){
            try{
               $categorylist->addCategory(array(
                    'name' => Input::get('category')
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