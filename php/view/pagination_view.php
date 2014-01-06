<?php
function pagination($pagination){
    if($pagination->totalPage() > 1) {
        if($pagination->hasPreviousPage()) { 
            echo "<a href=\"index.php?page=";
            echo $pagination->previousPage();
            echo "\">&laquo; Previous</a> "; 
        }
    
        for($i=1; $i <= $pagination->totalPage(); $i++) {
            if($i == $page) {
                echo " <span class=\"selected\">{$i}</span> ";
            } else {
                echo " <a href=\"index.php?page={$i}\">{$i}</a> "; 
            }
        }
    
        if($pagination->hasNextPage()) { 
            echo " <a href=\"index.php?page=";
            echo $pagination->nextPage();
            echo "\">Next &raquo;</a> "; 
        }
    }
}
?>