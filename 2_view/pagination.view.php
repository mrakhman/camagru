<?php

function show_paging($page_n, $total_pages)
{
?>
    <ul class="pagination">
        <li class="paging_el">
            <a href="?page_n=1">First</a>
        </li>
        <li class="<?php if($page_n <= 1){ echo 'disabled'; } ?> paging_el">
            <a href="<?php if($page_n <= 1){ echo '#'; } else { echo "?page_n=".($page_n - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page_n >= $total_pages){ echo 'disabled'; } ?> paging_el">
            <a href="<?php if($page_n >= $total_pages){ echo '#'; } else { echo "?page_n=".($page_n + 1); } ?>">Next</a>
        </li>
        <li class="paging_el">
            <a href="?page_n=<?php echo $total_pages; ?>">Last</a>
        </li>
    </ul>

<?php
}