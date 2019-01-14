<?php

include_once "1_models/camera.model.php";
include_once "3_controller/save_image_api.control.php";

session_start();

if ($_GET['action']=='post_img') {
    save_img_api();
}
else
    echo "hui";