<?php
function companyList($companylist){
    $i=1;
?>
<table border="2" cellpadding="6">
    <tr>
        <th>S.N</th>
        <th>Company</th>
        <th>Action</th>
    </tr>
    <?php
        foreach($companylist as $company){
            foreach($company as $list){
               echo" <tr>
                    <td>$i</td>
                    <td>$list</td>
                    <td><button class = 'btn btn-min btn-info' type='submit' name='delete' id='delete'>Delete</button>
                        <button class = 'btn btn-min btn-success' type='submit' name='delete' id='delete'>Edit</button>
                        <button class = 'btn btn-min btn-warning' type='submit' name='delete' id='delete'>Change Password</button></td>
                    </tr>";
                $i = $i +1;
            }
        }
    ?>
</table>
<?php } ?>