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
    $n_posts = count_all_posts();
    $pagination_arr =  pagination_vars($n_posts);
    $posts = show_all_posts($pagination_arr['offset'], $pagination_arr['no_of_records_per_page']);

    if (!($posts))
    {
        echo "Nobody made a post yet";
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
//    show_paging($pagination_arr['page_n'], $pagination_arr['total_pages']);
    echo '</div>';
    return TRUE;
}
