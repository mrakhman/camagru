<?php

 session_start();
// session_unset();
// session_destroy();

//phpinfo();

include_once "1_models/images.model.php";


function del_post_from_server($post_id)
{
    $file_name = get_filename_by_id($post_id);

    $file_path = 'Uploads/' . $file_name['file_name'];
    echo $file_path;
    //echo $file_path;
//    if (!unlink($file_path))
//    {
//        echo $file_name[0];
//        echo 'Mistaaaake';
//        return FALSE;
//    }
    return TRUE;
}

del_post_from_server('13');