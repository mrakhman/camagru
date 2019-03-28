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

//$com = show_post_comments(26);
//var_dump($com);
//
//
//function ec()
//{
//    echo 'Hello ';
//}
//
//function ho()
//{
//    echo 'Its' . ec() . ' World';
//}
//
//ho();

$notif = get_notifications_status(4);
echo($notif['notifications']);
//error_log($email['email']);