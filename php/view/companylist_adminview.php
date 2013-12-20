<?php
function companyList($companylist){
    $i=1;
?>
<div class="text-center"><legend>List of Companies</legend></div>
<?php if(Session::exists('home')){ ?>
        <div class='control-group error'>
            <h1 class='control-label text-center btn btn-large btn-block'><?php echo Session::flash('home'); ?></h1>
        </div>
<?php } ?>
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
            <form method='post' action = '<?php echo $_SERVER['PHP_SELF']."?company_name=$company"; ?>'>
<?php
            if($company != 'admins' && $company != 'normal users'){
?>            
                <button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete' value="delete" >Delete</button>
                <button class = 'btn btn-min btn-warning' type='submit' name='change_pw' id='change_pw' value="change_pw" >Change Password</button>
<?php
            }else{
?>
                <button class = 'text-center btn btn-min btn-info' type='submit' name='' id=''>Can't take any action</button>               
            </form>
        </td>
        </tr>
<?php
            }
        $i++;
        }
    ?>
</table>
<?php } ?>