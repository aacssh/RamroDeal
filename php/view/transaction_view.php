<?php
function transaction($data){
	$i = 1;
?>
<div class="table-responsive">
	<h2 class="text-center">My Customers:</h2><hr />
    <table class="table table-condensed" border='1' cellspacing= '2' cellpadding='2'>
        <tr>
        	<td>S.N</td>
            <th>Deal Name:</th>
            <th>Customer Name:</th>
            <th>Purchased Date:</th>
        </tr>
        
        <?php if(empty($data)){
                echo '<td colspan="4">No records found</td>';
            }else{
	            foreach ($data as $value){
	    ?>
                <tr>
                	<td><?php echo $i; ?></td>
                    <td><?php echo $value->deal_name; ?></td>
                    <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                    <td><?php echo strftime("%B %d %Y at %I:%M %p", strtotime(trim($value->coupon_date))); ?></td>
                </tr>
            <?php 
            	$i++;
        		}
        	}
        ?>
    </table>
</div>
<?php
}
?>