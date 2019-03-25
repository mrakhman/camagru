<?php

include_once "1_models/images.model.php";
include_once "1_models/users.model.php";
include_once "2_view/comment.view.php";

function friends_posts()
{
	$posts = show_other_posts($_SESSION['id']);
	if (!($posts))
	{
		echo "Huyushki";
		return FALSE;
	}

    echo '<div class="responsive">';
	$i = 0;
	$like_icons = ["img/icons/heart_white.png", "img/icons/heart_red.png"];
	$like_functions = ["like_post", "unlike_post"];
	while (array_key_exists($i, $posts) && $posts[$i])
    {
        $user_id = $posts[$i]['user_id'];
        $user_login = get_login_by_id($user_id);
        echo '<div class="gallery_container">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<img id="like_' . $posts[$i]['id'] . '" src="'. $like_icons[$posts[$i]['is_liked']] .'" width="40" align="right" onclick="'. $like_functions[$posts[$i]['is_liked']] .'('. $posts[$i]['id'] .')()">
			<p class="like_info" align="right">Likes: ' . $posts[$i]['likes'] . '</p>
			<p class="nick">' . $user_login['login'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>';
        show_comment_form($posts[$i]['id']);
        echo '</div>';
        $i++;
    }
    echo '</div>';
	return TRUE;
}

function all_posts()
{
    $posts = show_all_posts();
    if (!($posts))
    {
        echo "Huyushki";
        return FALSE;
    }

    echo '<div class="responsive">';
    $i = 0;
    while (array_key_exists($i, $posts) && $posts[$i])
    {
        $user_id = $posts[$i]['user_id'];
        $user_login = get_login_by_id($user_id);
        echo '<div class="gallery_container">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<p class="nick">' . $user_login['login'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>
		</div>';
        $i++;
    }
    echo '</div>';
    return TRUE;
}

if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    friends_posts();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
    all_posts();
}

