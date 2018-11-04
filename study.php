<?php
	$host = 'localhost';
	$user = 'root';
	$passwd = '123456';
	$dbname = 'camagru_mrakhman';

# set DSN
	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

# Create a PDO instance
	$pdo = new PDO($dsn, $user, $passwd);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

# PDO QUERY - start:

//	$stmt = $pdo->query('SELECT * FROM posts');

	// while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
	// 	{
	// 		echo $row[title] . " : " . $row[body] . '<br>'; // $row[title]
	// 	}


	// while ($row = $stmt->fetch(PDO::FETCH_OBJ))
	// 	{
	// 		echo $row->title . '<br>'; // $row->title
	// 	}


		// while ($row = $stmt->fetch())
		// {
		// 	echo $row->title . '<br>'; // added condition in str 12: $pdo->setAttribute
		// }

# PDO QUERY - end.


# PREPARED STATEMENTS (prepare & execute)

# UNSAFE
	
	//$sql = "SELECT * FROM posts WHERE author = '$author'"; // In this way instruction to sql can be put from usen input. It is bad!

# FETCH MULTIPLE POSTS

# User Input
	$author = 'Kaka1';
	$is_published = true;
	$id = 2;

# Positional Params:
	// $sql = 'SELECT * FROM posts WHERE author = ?'; // Parameter by position
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$author]);
	// $posts = $stmt->fetchAll();


# Named Params:
	// $sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published'; // Parameter by name
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['author' => $author, 'is_published' => $is_published]);
	// $posts = $stmt->fetchAll();

	// //var_dump($posts);
	// foreach($posts as $post)
	// {
	// 	echo $post->title . '<br>';
	// }

# FETCH SINGLE POST

	$sql = 'SELECT * FROM posts WHERE id = :id';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['id' => $id]);
	$posts = $stmt->fetch();

	echo $post->body;





