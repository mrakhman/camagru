<?php

include_once "1_models/camera.model.php";
include_once "3_controller/save_image_api.control.php";
include_once "3_controller/build_post.php";

session_start();

if ($_GET['action']=='save_img')
{
    save_img_api();
}
elseif ($_GET['action']=='build_post')
{
    build_post();
}
else
    echo "fail";


