<?php
function categoryTable($categorylist){
    $i=0;
?>
<table border="2" cellpadding="6">
    <tr>
        <th>S.N</th>
        <th>Category</th>
    </tr>
<?php
    while($i < count($categorylist) ){
?>
    <tr>
        <td><?php echo $i + 1; ?></td>
        <td><?php echo $categorylist[$i]->name; ?></td>
    </tr>
<?php
        $i++;
    }
?>
</table>
<?php } ?>