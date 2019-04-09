<?php

include_once "1_models/camera.model.php";
//include_once "3_controller/save_image_api.control.php";
include_once "3_controller/build_post.php";
include_once "3_controller/delete_post.php";
include_once "3_controller/like.control.php";
include_once "3_controller/comment.control.php";

session_start();

// First if condition is not called anywhere now. It was used during camera building to save raw web photo
//if ($_GET['action']=='save_img')
//{
//    save_img_api();
//}

// It is now substituted by this condition that saves and passes only data of an image
// Raw image is not stored in database - only post with sticker
if ($_GET['action']=='build_post')
{
    build_post();
}

elseif ($_GET['action']=='del_post')
{
    delete_post();
}

elseif ($_GET['action']=='like_post')
{
    like_post();
}
elseif ($_GET['action']=='unlike_post')
{
    unlike_post();
}

elseif ($_GET['action']=='comment_post')
{
    comment_post();
}

else
    echo "fail";


