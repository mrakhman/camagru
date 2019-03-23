<?php

include_once "1_models/images.model.php";

function like_post()
{
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    if (empty($user_id) || empty($post_id))
    {
        echo "loser";
        return FALSE;
    }

    if (!like($user_id, $post_id))
    {
        echo "I didn't like it";
        return FALSE;
    }
    return TRUE;
}

function unlike_post()
{
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    if (empty($user_id) || empty($post_id))
    {
        echo "loser";
        return FALSE;
    }

    if (!unlike($user_id, $post_id))
    {
        echo "I didn't unlike it";
        return FALSE;
    }
    return TRUE;
}