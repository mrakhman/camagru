<?php

 session_start();
// session_unset();
// session_destroy();

//phpinfo();
include_once "2_view/layout/head.php";
include_once "2_view/comment.view.php";

show_comment_form();