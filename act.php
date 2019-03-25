<?php

 session_start();
// session_unset();
// session_destroy();

//phpinfo();
include_once "2_view/layout/head.php";
include_once "2_view/comment.view.php";
include_once "3_controller/comment.control.php";

$com = show_post_comments(26);
var_dump($com);