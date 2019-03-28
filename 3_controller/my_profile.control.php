<?php

include_once "1_models/images.model.php";
include_once "2_view/comment.view.php";
include_once "3_controller/comment.control.php";

function show_my($user_id)
{
    $session_id = $_SESSION['id'];
	$posts = show_my_posts($user_id);

	if (!$posts)
	{
		echo "You have no posts yet, go to New image";
		return FALSE;
	}

	$i = 0;
    echo '<div class="responsive">';
	while (array_key_exists($i, $posts) && $posts[$i])
    {
//			echo '<div class="gallery_container" id="post_' . $posts[$i]['id'] . '">
        echo '<div class="gallery_container" id="post_' . $posts[$i]['id'] . '">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<p class="like_info" align="right">Likes: ' . $posts[$i]['likes'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>';

        if ($session_id == $posts[$i]['user_id'])
        {
            echo '<div align="right"><a href="" class="delete" onclick="delete_post_n('. $posts[$i]['id'] .')">Delete</a></div>';
//            echo '<a href="#" class="delete" id="post_' . $posts[$i]['id'] . '">Delete</a>';
        }

        echo '<button onclick="hide_show_comments('. $posts[$i]['id'] .')">Show comments</button>
            <div class="show_comments" style="display: none;">
            <hr class="divider">';

        show_post_comments($posts[$i]['id']);
        show_comment_form($posts[$i]['id']);
        echo '</div></div>';
        $i++;
    }
    echo '</div>';
	return TRUE;
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    show_my($_SESSION['id']);
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>