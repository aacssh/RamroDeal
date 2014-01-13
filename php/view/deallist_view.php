<?php
function deallist($deals){
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
            <img src="<?php echo $deals[$j]->cover; ?>" alt="Klematis" class="img-responsive img-circle" />
            <h4 class="caption"><?php echo $deals[$j]->name ?></h4>
            <p>Start Date:<?php echo strftime("%B %d %Y at %I:%M %p", strtotime($deals[$j]->start_date)); ?></p>
            <p>Actual price: <del>Rs. <?php echo $deals[$j]->actual_price; ?></del></p>
            <p>Offered price: Rs. <?php echo $deals[$j]->offered_price; ?></p>
            <div class="caption" style=" text-align: center;"><a href="php/controller/deals.php?deal=<?php echo $deals[$j]->deal_id; ?>"><button type="submit" name="buy" class="btn btn-info">View</button></a></div>
        </section>
    </article>    
<?php
        }
        echo '</section>';
    }
}
?>