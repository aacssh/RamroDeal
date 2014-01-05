<?php
function deallist($deals){
    $count = count($deals);
    for($i = 0; $i <= $count; $i=$i+4){
        echo '<section class="row">';
        $k = $i + 3;
        if($i > $count) break;
        for($j = $i; $j <= $k; $j++){
            if ($j >= $count) break;
?>
    <section class="span3">
        <section class="img">
            <img src="<?php echo $deals[$j]->cover; ?>" alt="Klematis" />
            <div class="desc"><h4><?php echo $deals[$j]->name ?></h4></div>
            <div class="desc"><strong>Start Date:<?php echo $deals[$j]->start_date; ?></strong></div>
            <div class="desc"><strong>Actual price: <del>Rs. <?php echo $deals[$j]->actual_price; ?></del></strong></div>
            <div class="desc"><strong>Offered price: Rs. <?php echo $deals[$j]->offered_price; ?></strong></div>
            <div class="desc" style=" text-align: center;"><a href="php/controller/deals.php?deal=<?php echo $deals[$j]->deal_id; ?>"><button type="submit" name="buy" class="btn btn-info">View</button></a></div>
        </section>
    </section>    
<?php
        }
        echo '</section>';
    }
}
?>