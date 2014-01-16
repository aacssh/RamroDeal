<?php
function customer_list($details){
//echo '<pre>'.print_r($details, true).'</pre>';
$i = 1;
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-sm-8">
				<div class="table-responsive">
	            <div class="text-center"><legend>List of Customers</legend></div>
	            <table class="table table-condensed table-bordered table-hover">
	                <tr>
	                    <th>S.N</th>
	                    <th>Name</th>
	                    <th>Username</th>
	                    <th>Male</th>
	                    <th>Contact No.</th>
	                    <th>Email</th>
	                    <th>Member Since</th>
	                </tr>
	            <?php
	                foreach($details as $detail){
	            ?>
	                <tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $detail->first_name.' '.$detail->last_name; ?></td>
	                    <td><?php echo $detail->username; ?></td>
	                    <td><?php if($detail->gender === 'M'){
	                    		echo 'Male';
	                    	}elseif($detail->gender === 'F'){
	                    		echo 'Femalie';
	                    	}
	                    ?>
	                    </td>
	                    <td><?php echo $detail->contact_no; ?></td>
	                    <td><?php echo $detail->email; ?></td>
	                    <td><?php echo strftime("%B %d %Y at %I:%M %p", strtotime(trim($detail->join_date))); ?></td>
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
<?php
}
?>