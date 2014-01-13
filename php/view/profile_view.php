<?php
function profile($data){
?>
  <div class="row">
    <div class="col-lg-5 col-lg-offset-3 col-sm-5 col-lg-offset-3">
        <div class="text-center"><legend><h2>Profile</h2><small>[ <a href='update.php'>edit</a> ]</small></legend><hr /></div>
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-hover">
                <tr>
                    <td>Name: </td>
                    <td><?php echo trim($data['first_name'].' '.$data['last_name']); ?></td>
                </tr>
                <tr>
                    <td>Sex: </td>
                    <td><?php
                            if ($data['gender'] === 'M'){
                                echo 'Male';
                            } elseif($data['gender'] === 'F'){
                                echo 'Female';
                            }
                    ?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo trim($data['email']); ?></td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><?php echo trim($data[0]->city); ?></td>
                </tr>
                 <tr>
                    <td>District: </td>
                    <td><?php echo trim($data[0]->district); ?></td>
                </tr>
                <tr>
                    <td>Country: </td>
                    <td><?php echo trim($data[0]->country); ?></td>
                </tr>
                <tr>
                    <td>Contact No: </td>
                    <td><?php echo trim($data['contact_no']); ?></td>
                </tr>
                <tr>
                    <td>Member Since: </td>
                    <td><?php echo strftime("%B %d %Y at %I:%M %p", strtotime(trim($data['join_date']))); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
}
?>