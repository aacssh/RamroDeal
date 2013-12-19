<?php
function companyList($companylist){
    $i=1;
?>
<div class="text-center"><legend>List of Companies</legend></div>
<table border="2" cellpadding="6">
    <tr>
        <th>S.N</th>
        <th>Company</th>
        <th>Action</th>
    </tr>
<?php   foreach($companylist as $company){ ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $company; ?></td>
        <td>
<?php
    if($company !== 'individual'){
?>
            <button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete'>Delete</button>
            <button class = 'btn btn-min btn-success' type='submit' name='delete' id='delete'>Edit</button>
            <button class = 'btn btn-min btn-warning' type='submit' name='delete' id='delete'>Change Password</button>
        </td>
        </tr>
<?php
    }else{
?>
        <button class = 'text-center btn btn-min btn-info' type='submit' name='delete' id='delete'>Can't take any action</button>
        </td>
        </tr>
<?php
    }
    $i++;
}
    ?>
</table>
<?php } ?>