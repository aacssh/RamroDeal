<?php
function deallist($deals){
    $count = count($deals);
    for($i = 0; $i <= $count; $i=$i+4){
        echo '<div class="row">';
        $k = $i + 3;
        if($i > $count) break;
        for($j = $i; $j <= $k; $j++){
            if ($j >= $count) break;
            $img = explode('/var/www',$deals[$j]->cover);
?>
    <div class="span3">
        <div class="img">
            <img src="<?php echo $img[1]; ?>" alt="Klematis" />
            <div class="desc"><h4><?php echo $deals[$j]->name ?></h4></div>
            <div class="desc"><strong>Start Date:<?php echo $deals[$j]->start_date; ?></strong></div>
            <div class="desc"><strong>Actual price: <del>Rs. <?php echo $deals[$j]->actual_price; ?></del></strong></div>
            <div class="desc"><strong>Offered price: Rs. <?php echo $deals[$j]->offered_price; ?></strong></div>
            <div class="desc" style=" text-align: center;"><a href="php/controller/deals.php?deal=<?php echo $deals[$j]->name; ?>"><button type="submit" name="buy" class="btn btn-info">View</button></a></div>
        </div>
    </div>    
<?php
        }
        echo '</div>';
    }
}
?>