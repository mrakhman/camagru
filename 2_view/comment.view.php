<?php

function show_comment_form()
{
?>

    <form class="" method="post">
        <div>
            <textarea id="comment" placeholder="Add a comment" rows="2" cols="30" maxlength="256"></textarea>
            <div id="comment_count"></div>
        </div>
        <input align="right" type="submit" class="button" name="send" value="OK"/>
    </form>


<?php
}
