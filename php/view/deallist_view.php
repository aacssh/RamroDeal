<?php
function deallist($deals){
    $user = new User();
    //echo '<pre>'.print_r($deals, true).'</pre>';
    $count = count($deals);
    for($i = 0; $i <= $count; $i=$i+4){
        echo '<section class="row">';
        $k = $i + 3;
        if($i > $count) break;
        for($j = $i; $j <= $k; $j++){
            if ($j >= $count) break;
?>
    <article class="col-lg-6 col-sm-6 col-xs-6">
        <section class="thumbnail">
            <img src="<?php echo $deals[$j]->cover; ?>" alt="Klematis" id="img" class="img-responsive img-rounded" />
            <div class="row">
                <div class="col-lg-6 col-lg-offset-1 col-sm-6 col-xs-6 col-xs-offset-1">
                    <h3 class="caption"><?php echo $deals[$j]->name ?></h3><hr />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-4 col-xs-4 col-xs-offset-1">
                    <span class='text-info'><b>Actual price: <del>Rs. <?php echo $deals[$j]->actual_price; ?></del></b></span>
                </div>
                <div class="col-lg-5 col-lg-offset-1 col-sm-4 col-xs-4 col-xs-offset-1">
                    <span class='text-info'><b>Offered price: Rs. <?php echo $deals[$j]->offered_price; ?></b></span>
                </div>
            </div>
            <?php 
                if($user->isLoggedIn()){
                    echo "<div class='caption' style='text-align: center;'><a href='../deals.php?deal=".$deals[$j]->deal_id."'>
                        <button type='submit' name='buy' class='btn btn-info'>View</button></a></div>";
                }else{
                    echo "<div class='caption' style='text-align: center;'><a href='".BASE_URL."php/controller/deals.php?deal=".$deals[$j]->deal_id."'>
                        <button type='submit' name='buy' class='btn btn-info'>View</button></a></div>";
                }
            ?>
            <span class="btn btn-warning btn-lg btn-block text-center">Deal closes on: <?php echo strftime("%B %d %Y", strtotime($deals[$j]->end_date)); ?></span>
        </section>
    </article>    
<?php
        }
        echo '</section>';
    }
}
?>