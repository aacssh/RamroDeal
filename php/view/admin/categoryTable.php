<?php
function categoryTable($deallist){
    $i=1;
?>
<table border="2" cellpadding="6">
    <tr>
        <th>S.N</th>
        <th>Category</th>
    </tr>
    <?php
        foreach($deallist as $deal){
            foreach($deal as $list){
               echo" <tr>
                    <td>$i</td>
                    <td>$list</td>
                </tr>";
                $i = $i +1;
            }
        }
    ?>
</table>
<?php } ?>