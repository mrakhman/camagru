<?php

include_once "1_models/images.model.php";
include_once "2_view/comment.view.php";
include_once "3_controller/comment.control.php";
include_once "3_controller/pagination.control.php";

function my_posts()
{
    $session_id = $_SESSION['id'];

    $n_posts = count_my_posts($session_id);
    $pagination_arr =  pagination_vars($n_posts);
    $posts = show_my_posts($session_id, $pagination_arr['offset'], $pagination_arr['no_of_records_per_page']);

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
			
			<div id="share_media" class="flex_share_col">
			    <div class="flex_share_row">
			    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                </div><div class="flex_share_row">
                <script type="text/javascript">document.write(VK.Share.button(type="round_nocount", text="Share"));</script>
            </div></div>
            
            <p class="like_info" align="right">Likes: ' . $posts[$i]['likes'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>';

        if ($session_id == $posts[$i]['user_id'])
        {
            echo '<div align="right"><a href="" class="delete" onclick="delete_post_n('. $posts[$i]['id'] .')">Delete</a></div>';
//            echo '<a href="#" class="delete" id="post_' . $posts[$i]['id'] . '">Delete</a>';
        }

        echo '<button class="button show_comments_btn" onclick="hide_show_comments('. $posts[$i]['id'] .')">Show comments</button>
            <div class="show_comments" style="display: none;">
            <hr class="divider">';

        show_post_comments($posts[$i]['id']);
        show_comment_form($posts[$i]['id']);
        echo '</div></div>';
        $i++;
    }
    show_paging($pagination_arr['page_n'], $pagination_arr['total_pages']);
    echo '</div>';
	return TRUE;
}


if (isset($_SESSION['user']) && isset($_SESSION['id']))
{
    my_posts();
}

else if (empty($_SESSION['user']) || empty($_SESSION['id']))
{
	header('Location: index.php');
}

?>