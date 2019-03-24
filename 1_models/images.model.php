<?php
include_once "config/database.php";

//function add_photo($user_id, $image_name)
//{
//	global $pdo;
//
//	if (empty($user_id) || empty($image_name))
//		return FALSE;
//
//	$sql = 'INSERT INTO images(user_id, image_name) VALUES(:user_id, :image_name)';
//	$stmt = $pdo->prepare($sql);
//	$stmt->execute(['user_id' => $user_id, 'image_name' => $image_name]);
//	return TRUE;
//}


function add_post($user_id, $file_name, $description)
{
    global $pdo;
    if (empty($user_id) || empty($file_name))// || empty($description))
        return FALSE;
    $sql = 'INSERT INTO posts(user_id, file_name, description) VALUES(:user_id, :file_name, :description)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id, 'file_name' => $file_name, 'description' => $description]);
    return TRUE;
}


function show_my_posts($user_id)
{
	global $pdo;

	if (empty($user_id))
		return FALSE;

	// The way of counting likes on ONLY my posts before we added trigger functions to database likes (see Telegram from Mar 24)
    // Trigger unction is used now but this way is saved just in case something goes wrong with trigger functions

//    $sql = 'SELECT posts.id, posts.user_id, posts.file_name, posts.description, posts.created_at, COUNT(likes.post_id) AS likes
//            FROM posts LEFT JOIN likes
//            ON posts.id = likes.post_id
//            GROUP BY posts.id
//            HAVING user_id = :user_id
//            ORDER BY created_at DESC';


    $sql = 'SELECT posts.id, posts.user_id, posts.file_name, posts.description, posts.created_at, posts.likes
            FROM posts
            WHERE user_id = :user_id
            ORDER BY created_at DESC';

//    $sql = 'SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
	$stmt->execute(['user_id' => $user_id]);
	// if (!($stmt->fetch(PDO::FETCH_ASSOC)))
	// 	return NULL;

	$i = 0;
	$my_posts[$i] = array();
	while ($my_post = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		$my_posts[$i] = $my_post;
		$i++;
	}
	return ($my_posts);
}


function show_all_posts()
{
    global $pdo;

    $sql = 'SELECT * FROM posts ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $i = 0;
    $all_posts[$i] = array();
    while ($all_post = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $all_posts[$i] = $all_post;
        $i++;
    }
    return ($all_posts);
}

function show_other_posts($user_id)
{
    global $pdo;

    if (empty($user_id))
        return FALSE;

//    $sql = 'SELECT * FROM posts WHERE user_id != :user_id ORDER BY created_at DESC';
    $sql = 'SELECT posts.id, posts.user_id, posts.file_name, posts.description, posts.created_at, posts.likes, 
            CASE WHEN liker_id IS NULL THEN 0 ELSE 1 END AS is_liked
            FROM posts
            LEFT JOIN likes ON likes.post_id = posts.id AND likes.liker_id = :user_id_1
            WHERE user_id != :user_id_2
            ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id_1' => $user_id, 'user_id_2' => $user_id]);

    $i = 0;
    $all_posts[$i] = array();
    while ($all_post = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $all_posts[$i] = $all_post;
        $i++;
    }
    return ($all_posts);
}

function get_filename_by_id($post_id)
{
    global $pdo;

    if (empty($post_id))
        return FALSE;

    $post_id = intval($post_id);

    $sql = 'SELECT file_name FROM posts WHERE id = :post_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id]);
    if (!($file_name = $stmt->fetch(PDO::FETCH_ASSOC)))
        return NULL;

    return ($file_name);
}

function del_post_from_db($user_id, $post_id)
{
    global $pdo;

    if (empty($user_id) || empty($post_id))
        return FALSE;

    $post_id = intval($post_id);

    $sql = 'DELETE FROM posts WHERE user_id = :user_id AND id = :post_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id, 'post_id' => $post_id]);
    return TRUE;
}

function like_exists($user_id, $post_id)
{
    global $pdo;

    if (empty($user_id) || empty($post_id))
        return FALSE;

    $post_id = intval($post_id);
    $sql = 'SELECT * FROM likes WHERE post_id = :post_id AND liker_id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);
    if (!($like = $stmt->fetch(PDO::FETCH_ASSOC)))
        return NULL;

    return ($like);
}

function like($user_id, $post_id)
{
    global $pdo;

    if (empty($user_id) || empty($post_id))
        return FALSE;

    $like = like_exists($user_id, $post_id);
    if ($like)
        return TRUE;

    $post_id = intval($post_id);
    $sql = 'INSERT INTO likes(post_id, liker_id) VALUES(:post_id, :user_id)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);
    return TRUE;
}

function unlike($user_id, $post_id)
{
    global $pdo;

    if (empty($user_id) || empty($post_id))
        return FALSE;

    $post_id = intval($post_id);
    $sql = 'DELETE FROM likes WHERE post_id = :post_id AND liker_id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id, 'user_id' => $user_id]);
    return TRUE;
}

