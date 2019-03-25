<?php

include_once "1_models/images.model.php";

function comment_post()
{
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];

    if (empty($user_id) || empty($post_id) || empty($comment))
    {
        echo "failed: comment empty data";
        return FALSE;
    }

    if (!add_comment($user_id, $post_id, $comment))
    {
        // error_log($user_id . " sent comment " . $comment . " for post #" . $post_id);
        echo "failed: comment sql error";
        return FALSE;
    }
    echo "Comment received";
    return TRUE;
}

function show_post_comments($post_id)
{
    $comments = show_comments($post_id);
    if (!$comments)
        return FALSE;
    return $comments;
}