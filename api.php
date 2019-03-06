<?php

include_once "1_models/camera.model.php";
include_once "3_controller/save_image_api.control.php";
include_once "3_controller/stickers.control.php";

session_start();

if ($_GET['action']=='save_img') {
    save_img_api();
//    add_sticker();
}
else
    echo "fail";


