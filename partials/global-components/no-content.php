<?php echo '<section class="l-gutter o-no-content">';
    if(is_search()){
        echo '<p class="a-fineprint">F&ouml;rfina din s&ouml;kning (ovan) eller leta vidare med hj&auml;lp av dessa etiketter:</p>';
    }
    listTags();
echo '</section>';