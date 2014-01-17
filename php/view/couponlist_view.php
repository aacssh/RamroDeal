<?php
function couponList($couponDetails){
	//echo '<pre>'.print_r($couponDetails, true).'</pre>';
$i = 1;
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-sm-8">
				<div class="table-responsive">
		            <div class="text-center"><legend>My Coupons</legend></div>
			            <table class="table table-condensed table-bordered table-hover">
			                <tr>
			                    <th>S.N</th>
			                    <th>Coupon No.</th>
			                    <th>Deal Name</th>
			                    <th>Purchase Date</th>
			                </tr>
			            <?php
			                foreach($couponDetails as $details){
			            ?>
			                <tr>
			                    <td><?php echo $i; ?></td>
			                    <td><?php echo $details->coupon_no; ?></td>
			                    <td><a href="<?php echo BASE_URL;?>php/controller/deals.php?deal=<?php echo $details->deal_id;?>"><?php echo $details->name; ?></a></td>
			                    <td><?php echo strftime("%B %d %Y", strtotime(trim($details->purchase_date)))?></td>
			                </tr>
			            <?php
			                    	$i++;
			                }
			                ?>
			            </table>
		            </div>
	        	</div>
			</div>
		</div>
	</div>
<?php
}
?>