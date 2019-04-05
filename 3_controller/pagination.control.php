<?php
include_once "3_controller/comment.control.php";
include_once "1_models/images.model.php";
include_once "2_view/pagination.view.php";




function pagination_vars($n_posts)
{
    if (isset($_GET['page_n'])) {
        $page_n = $_GET['page_n'];
    } else {
        $page_n = 1;
    }
    $array['page_n'] = $page_n;

    $no_of_records_per_page = 3;
    $array['no_of_records_per_page'] = $no_of_records_per_page;

    $offset = ($page_n-1) * $no_of_records_per_page;
    $array['offset'] = $offset;



    $total_pages = ceil($n_posts / $no_of_records_per_page);
    $array['total_pages'] = $total_pages;

    return $array;
}



function all_p()
{

    $user_id = $_SESSION['id'];
    $n_posts = count_other_posts($user_id);
    $pagination_arr =  pagination_vars($n_posts);

    echo $n_posts;


    $posts = show_other_posts($user_id, $pagination_arr['offset'], $pagination_arr['no_of_records_per_page']);
    if (!($posts))
    {
        echo "Your friends have no posts";
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
        echo '<div class="gallery_container" id="post_' . $posts[$i]['id'] . '">
			<img src="Uploads/' . $posts[$i]['file_name'] . '" width="300">
			<img id="like_' . $posts[$i]['id'] . '" src="'. $like_icons[$posts[$i]['is_liked']] .'" width="40" align="right" onclick="'. $like_functions[$posts[$i]['is_liked']] .'('. $posts[$i]['id'] .')()">
			<p class="like_info" align="right">Likes: ' . $posts[$i]['likes'] . '</p>
			<p class="nick">' . $user_login['login'] . '</p>
			<p class="desc">' . $posts[$i]['description'] . '</p>
			<p class="date">' . $posts[$i]['created_at'] . '</p>
			<button onclick="hide_show_comments('. $posts[$i]['id'] .')">Show comments</button>
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

all_p();