<?php
function pagination($pagination){
    echo '<ul class="pagination">';
    if($pagination->totalPage() > 1) {
        if($pagination->hasPreviousPage()) { 
            echo "<li><a href=\"?page=";
            echo $pagination->previousPage();
            echo "\">&laquo; Previous</a></li>"; 
        }
    
        for($i=1; $i <= $pagination->totalPage(); $i++) {
            if($i == $pagination->currentPage()) {
                echo " <li><span class=\"selected\">{$i}</span></li> ";
            } else {
                echo " <li><a href=\"?page={$i}\">{$i}</a></li> "; 
            }
        }
    
        if($pagination->hasNextPage()) { 
            echo " <li><a href=\"?page=";
            echo $pagination->nextPage();
            echo "\">Next &raquo;</a></li> "; 
        }
    }
    echo '</ul>';
}
?>