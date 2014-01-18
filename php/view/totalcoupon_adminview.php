<?php
function totalcoupon($data){
?>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <ul class="nav nav-list">
            <li><a href="?type=coupons" title="Coupon purchased till today"><h4>All Coupons</h4></a></li>
            <li><a href="?type=purchased" title="All Purchased Deals till today"><h4>All Purchased Deals</h4></a></li>
            <li><a href="?type=expired" title="Expired Deals till today"><h4>Expired Deals</h4></a></li>
        </ul>
    </div>
    <div class="col-lg-9 col-sm-9">
        <h3>DASHBOARD</h3>
        <h4>TOTAL COUPON PURCHASED</h4><hr />
        <div class="table-responsive">
            <table class="table table-condensed" border='1' cellspacing= '2' cellpadding='2'>
                <tr>
                    <th>Deal Name:</th>
                    <th>Total Coupon Purchased:</th>
                    <th>Remaining Coupon:</th>
                </tr>
                
                <?php if(empty($data)){
                        echo '<td colspan="3">No records found</td>';
                    }else{
                    foreach ($data as $value): 
                    $min = $value->minimum_purchase_requirement - $value->total_people;
                    $max = $value->maximum_purchase_requirement - $value->total_people;
                    ?>
                        <tr>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->total_people; ?></td>
                            <td><?php echo $min.' - '.$max; ?></td>
                        </tr>
                    <?php endforeach;
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
}
?>