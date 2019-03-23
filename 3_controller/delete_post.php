<?php

include_once "1_models/images.model.php";

function del_post_from_server($post_id)
{
    $file_name = get_filename_by_id($post_id);
    $file_path = 'Uploads/' . $file_name['file_name'];
    if (!unlink($file_path))
    {
        echo $file_name[0];
        echo 'Mistaaaake';
        return FALSE;
    }

    echo 'Post '. $file_name['file_name'] . ' deleted';
    return TRUE;
}

function delete_post()
{
    $user_id = $_SESSION['id'];
    $post_id = $_POST['post_id'];

    if (empty($user_id) || empty($post_id))
    {
        echo "loser";
        return FALSE;
    }

    if (!del_post_from_server($post_id))
        return FALSE;
    if (!del_post_from_db($user_id, $post_id))
        return FALSE;

    return TRUE;
}
