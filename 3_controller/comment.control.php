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

    if (!send_comment_email($post_id))
    {
        echo "failed: couldn't send email notification even though it is turned on";
        return FALSE;
    }

    echo "Comment received";
    return TRUE;
}

function show_post_comments($post_id)
{
    $comments = show_comments($post_id);
    if (!$comments)
    {
        echo "No comments";
        return TRUE;
    }

    echo '<div class="comments_array">';

    foreach ($comments as $comm)
    {
        $verb = " says";
        if ($comm['commentator_id'] == $_SESSION['id'])
        {
            $commentator['login'] = "You";
            $verb = " say";
        }
        else
            $commentator = get_login_by_id($comm['commentator_id']);
        echo '<p class="comment_display" align="left"> <b>' . $commentator['login'] . $verb . ': </b>' . $comm['text'] . '</p>';
    }
    echo '</div>';
    return TRUE;
}

