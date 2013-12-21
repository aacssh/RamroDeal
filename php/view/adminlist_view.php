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
            <form method='post' action = '<?php echo $_SERVER['PHP_SELF']."?admin=$admin->first_name $admin->last_name"; ?>'>
                <button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete' value="delete">Delete</button>
                <button class = 'btn btn-min btn-warning' type='submit' name='change_pw' id='change_pw' value="change_pw">Change Password</button>
            </form>
        </td>
        </tr>
<?php
    $i++;
}
    ?>
</table>
<?php
    if(Session::exists('home')){ ?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php
    }
}
?>