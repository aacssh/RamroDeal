<?php
function totalcoupon(){
?>
<div class="row">
    <div class="span3">
        <ul class="nav nav-list">
            <li><a href="#" title="Coupon purchased till today"><h4>All Coupons</h4></a></li>
            <li><a href="#" title="Coupon purchased today"><h4>Today's Coupons</h4></a></li>
            <li><a href="#" title="All Purchased Deals till today"><h4>All Purchased Deals</h4></a></li>
            <li><a href="#" title="Today's Deals Purchased"><h4>Today's Purchased Deals</h4></a></li>
            <li><a href="#" title="Expired Deals till today"><h4>Expired Deals</h4></a></li>
        </ul>
    </div>
    <div class="span9">
        <h3>DASHBOARD</h3>
        <h4>TOTAL COUPON PURCHASED</h4><hr />
        <table class="table table-hover table-condensed" border='1' cellspacing= '2' cellpadding='2'>
            <tr>
                <th>
                    Total Coupon Purchased:
                </th>
                <th>
                    Total Amount Saved:
                </th>
            </tr>
            <tr>
                <td colspan="2">No records found</td>
            </tr>
        </table>
    </div>
</div>
<?php
}
?>