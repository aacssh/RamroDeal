<?php
function profile($data){
?>
    <div class="row">
        <div class="span7">
            <table>
                <tr>
                    <td>Name: </td>
                    <td><?php echo trim($data->first_name.' '.$data->last_name); ?></td>
                </tr>
                <tr>
                    <td>Sex: </td>
                    <td><?php
                            if ($data->gender === 'M'){
                                echo 'Male';
                            } elseif($data->gender === 'F'){
                                echo 'Female';
                            }
                    ?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo trim($data->email); ?></td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td><?php echo trim($data->city); ?></td>
                </tr>
                 <tr>
                    <td>District: </td>
                    <td><?php echo trim($data->district); ?></td>
                </tr>
                  <tr>
                    <td>Country: </td>
                    <td><?php echo trim($data->country); ?></td>
                </tr>
                <tr>
                <tr>
                    <td>Contact No: </td>
                    <td><?php echo trim($data->contact_no); ?></td>
                </tr>
                <tr>
                    <td>Member Since: </td>
                    <td><?php echo trim($data->join_date); ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php
}
?>