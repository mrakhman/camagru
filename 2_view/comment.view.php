<?php

function show_comment_form($post_id)
{
?>
    <form class="comment_form">
        <div id="flex_container_com">
            <textarea id="comment" placeholder="Comment" rows="2" cols="38" maxlength="255" required></textarea>
            <div id="comment_count"></div>
            <input id="post_id" hidden value="<?php echo $post_id; ?>" />
            <input type="submit" id="btn_comment" class="button" name="send" value="Send"/>
            <div id="response_field"></div>
        </div>
    </form>


<?php
}
