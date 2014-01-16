<?php
include 'php/init.php';

$user = new User();
if($user->isLoggedIn()){
    if($user->hasPermission('admin')){
        Redirect::to('members/homepage_admin.php');
    }elseif($user->hasPermission('sub-admin')){
        Redirect::to('members/homepage_subadmin.php');
    } elseif($user->hasPermission('mer_admin')){
        Redirect::to('members/homepage_merchant.php');
    } elseif($user->hasPermission('moderator')){
        Redirect::to('');
    } elseif($user->hasPermission('normal_user')){
        Redirect::to('members/homepage_normalUser');
    }
} else{
    $categorylist = Category::getCategoryInstance();
    $categorylist->getCategory();
    ramrodeal_header("Welcome to RamroDeal - Great Deal, Great Price"); //heading part of html
    nav($categorylist->data());  //navigation part of html

    if(Session::exists('home')){
?>
    <div class='alert alert-success'>
        <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php
    }
    banner();   //banner part of html
    
    $deal = Deal::getDealInstance();
    $currentPage = Input::get('page');
    $currentPage = empty($currentPage) ? 1 : $currentPage;
    $perPage = 3;
    
    if(Input::get('category')){
        $selected_category = clone $categorylist;
        $category_id = $selected_category->getSingleId(array(
            'where_clause' => array(
                'name', '=', Input::get('category')
            )
        ));

        $totalCount = $deal->countAll(array(
            'where_clause' => array(
                'category_id', '=', $selected_category->data()->category_id
            ),
        ));
        foreach($totalCount->data() as $count){
            $totalCount = $count;
        }
        $pagination = new Pagination($currentPage, $perPage, $totalCount);
        $deal->getAllDeal(array(
            'limit_clause' => array(
                'LIMIT' => $perPage,
                'OFFSET' => $pagination->offset()
            ),
            'where_clause' => array(
                'category_id', '=',  $selected_category->data()->category_id
            )
        ));
    }elseif(Input::get('deal')){
        $totalCount = $deal->countAll(array(
            'where_clause' => array(
                'status', '=', 0
            ),
        ));
        foreach($totalCount->data() as $count){
            $totalCount = $count;
        }
        $pagination = new Pagination($currentPage, $perPage, $totalCount);
        $deal->getAllDeal(array(
            'limit_clause' => array(
                'LIMIT' => $perPage,
                'OFFSET' => $pagination->offset()
            ),
            'where_clause' => array(
                'status', '=',  0
            )
        ));
    }else{
        $totalCount = $deal->countAll();
        foreach($totalCount->data() as $count){
            $totalCount = $count;
        }
        $pagination = new Pagination($currentPage, $perPage, $totalCount);
        $deal->getAllDeal(array(
            'limit_clause' => array(
                'LIMIT' => $perPage,
                'OFFSET' => $pagination->offset()
            ),
            'where_clause' => array()
        ));
    }
    $list = $deal->data();
    $deals_list = array();
    foreach($list as $deals){
        $img = Image::getImageInstance()->getCoverImage(array(
            'where_clause' => array(
                'image_id', '=', $deals->image_id
            )
        ));
        $deals->cover = UPLOADPATH.$img->data()->cover_image;
        array_push($deals_list, $deals);
    }
    deallist($deals_list);
    pagination($pagination);
    ramrodeal_footer(); //footer of html
}
?>