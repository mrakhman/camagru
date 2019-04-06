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
include_once "2_view/pagination.view.php";
include_once "3_controller/pagination.control.php";

?>

<!--<div id="fb-root"></div>-->
<!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>-->
<!---->
<!--<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->


<?php //include_once "3_controller/pagination.control.php"; ?>
