<?php
function categoryTable($categorylist){
    $i=0;
?>
<div class="row">
<div class="col-lg-5 col-lg-offset-3 col-sm-5 col-lg-offset-3">
<div class="table-responsive">
    <table class="table table-condensed table-bordered table-striped">
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
    </div>
</div>
</div>
<?php } ?>