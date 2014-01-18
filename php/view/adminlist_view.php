<?php
function adminList($adminlist){
    $i=1;
?>
<div class="row">
    <div class="col-lg-5 col-lg-offset-3 col-sm-5 col-lg-offset-3">
        <div class="table-responsive">
            <div class="text-center"><legend>List of Admins</legend></div>
            <table class="table table-condensed table-bordered table-hover">
                <tr>
                    <th>S.N</th>
                    <th>Admins</th>
                    <th>Action</th>
                </tr>
<?php   foreach($adminlist as $admin){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td name"<?php echo $admin->first_name.' '. $admin->last_name;  ?>"><?php echo $admin->first_name.' '. $admin->last_name;  ?></td>
                    <td>
                        <form method='post' action = '<?php echo $_SERVER['PHP_SELF']."?fname=$admin->first_name&lname=$admin->last_name"; ?>'>
                            <input type="hidden" name='email' value="<?php echo $admin->email; ?>">
                            <button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete' value="delete">Delete</button>
                        </form>
                    </td>
                </tr>
<?php
    $i++;
}
    ?>
            </table>
        </div>
    </div>
</div>
<div class='row'>
<?php
    if(Session::exists('home')){ ?>
        <div class='alert alert-danger'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php
    }
    echo '</div>';
}
?>