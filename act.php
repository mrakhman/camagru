<?php

 session_start();
// session_unset();
// session_destroy();

//phpinfo();
include_once "2_view/layout/head.php";
include_once "2_view/comment.view.php";
include_once "3_controller/comment.control.php";
include_once "1_models/images.model.php";
include_once "1_models/users.model.php";

$owner_id = get_postowner_id(40);
$owner_id = $owner_id['user_id'];
echo $owner_id;