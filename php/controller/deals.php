<?php
include '../init_index.php';

$user = new User();

$comment = Comment::getCommentInstance();
if(Input::exists()){
    if(Input::get('hide') === ''){
        if(Input::get('submit') === 'buy'){
            if(Token::check(Input::get('token'))){
                if($user->isLoggedIn()){
                    echo "<script>alert('You can Buy');</script>";
                } else{
                    echo "<script>alert('Please log in to buy');</script>";
                }
            }
        }
        elseif(Input::get('submit') === 'comment'){
          $validate = Validate::getValidateInstance();
          $validation = $validate->check($_POST, array(
             'comment' => array(
                'required' => true,
             )
          ));
          
          if($validation->passed()){
             try{
                $comment->add(array(
                    'deal_id' => Input::get('deal'),
                    'created' => strftime("%Y-%m-%d %I:%M:%S", time()),
                    'user_id' => 'mIh5V7wsHE7LAfS90I',
                    'body' => Input::get('comment')
                ));
                //Session::flash('home', 'Comment added!');
                echo "<script>alert('Comment added');</script>";
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

$deals= Deal::getDealInstance()->getSingleDeal(array(
    'where_clause' => array(
        'deal_id', '=', Input::get('deal')
    )
));
$img = Image::getImageInstance();
$deal = $deals->data();
$allImageList = $img->getAllImage(array(
    'where_clause' => array(
        'image_id', '=', $deal->image_id
    )
));
$images = $allImageList->data();
$company = Company::getCompanyInstance()->getSingleCompany(array(
    'where_clause' => array(
        'company_id', '=', $deal->company_id
    )
));
$deal->company = $company->data()->name;
$deal->cover = UPLOADPATH.$images[0]->cover_image;
$deal->firstImage = UPLOADPATH.$images[0]->image1;
$deal->secondImage = UPLOADPATH.$images[0]->image2;
$comment->getAll(array(
    'order_clause' => array(
        'order by' => 'created',
        'order' => 'DESC'
    ),
    'where_clause' => array(
        'deal_id','=', Input::get('deal')
    )
));
$commentUser = $comment->data();
$x = 0;
while($x < count($commentUser)){
    $user->getUsers('username', array(
        'where_clause' => array(
            'user_id', '=', $commentUser[$x]->user_id
        )
    ));
    $data = $user->data();
    $commentUser[$x]->username = $data[0]->username;
    $x++;
}
ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
nav();  //navigation part of html
deals($deal, $commentUser);
ramrodeal_footer(); //footer of html
?>