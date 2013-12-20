<?php
function adminList($adminlist){
    $i=1;
?>
<div class="text-center"><legend>List of Admins</legend></div>
<table border="2" cellpadding="6">
    <tr>
        <th>S.N</th>
        <th>Admins</th>
        <th>Action</th>
    </tr>
<?php   foreach($adminlist as $admin){ ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $admin->first_name.' '. $admin->last_name;  ?></td>
        <td>
            <button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete'>Delete</button>
            <button class = 'btn btn-min btn-success' type='submit' name='delete' id='delete'>Edit</button>
            <button class = 'btn btn-min btn-warning' type='submit' name='delete' id='delete'>Change Password</button>
        </td>
        </tr>
<?php
    $i++;
}
    ?>
</table>
<?php } ?>