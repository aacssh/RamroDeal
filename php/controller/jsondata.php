<?php
header('Content-Type: application/json');
include '../init.php';

$comment = Comment::getCommentInstance();
$deals= Deal::getDealInstance()->getAllDeal();
$company = Company::getCompanyInstance()->getAllCompany('company_id, name, address');
$comment = Comment::getCommentInstance()->getAll();
$deal_json = array();

foreach ($deals->data() as $dealValue) {
    $img = Image::getImageInstance()->getAllImage();
    foreach ($img->data() as $key => $value) {
        if($dealValue->image_id == ($key+1)){
            $dealValue->cover_image = UPLOADPATH.$value->cover_image;
            $dealValue->image1 = UPLOADPATH.$value->image1;
            $dealValue->image2 = UPLOADPATH.$value->image2;
        }
    }
    foreach ($company->data() as $key => $value) {
        if($dealValue->company_id == ($value->company_id)){
            $dealValue->company_name = $value->name;
            $address = Address::getAddressInstance()->getAllAddress();

            foreach ($address->data() as $addressKey => $addressValue) {
                if($value->address == ($addressValue->address_id)){
                    $dealValue->city = $addressValue->city;
                    $dealValue->district = $addressValue->district;
                    $dealValue->country = $addressValue->country;
                }
            }
        }
    }
    $comments =array();
    foreach ($comment->data() as $key => $value) {
        if($dealValue->deal_id == ($value->deal_id)){
            $user = new User();
            $user->getUsers('user_id, username');
            foreach ($user->data() as $userKey => $userValue) {
                if($value->user_id == ($userValue->user_id)){
                    array_push($comments, array(
                        'username' => $userValue->username, 
                        'date' => $value->created, 
                        'comment' => $value->body
                    ));
                }
            }
        }
    }

    $dealValue->comments = $comments;

    array_push($deal_json, (array)$dealValue);
}

$json = json_encode($deal_json);
echo $json;
//echo '<pre>'.print_r($deal_json, true).'</pre>';