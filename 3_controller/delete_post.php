<?php

include_once "1_models/images.model.php";


function delete_post()
{
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    if (empty($user_id) || empty($post_id))
    {
        echo "loser";
        return FALSE;
    }

    if (!del_post($user_id, $post_id))
        return FALSE;
    return TRUE;
}
