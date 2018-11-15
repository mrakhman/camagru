<?php
// 	$host = '127.0.0.1';
// 	//$host = 'localhost';
// 	$user = 'root';
// 	$passwd = '123456';
// 	$dbname = 'camagru_mrakhman';

// # set DSN - data source name
// 	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// # Create a PDO instance
// 	$pdo = new PDO($dsn, $user, $passwd);
// 	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// 	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable the emulation mode (change the default)

include 'config/database.php';

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

# FETCH (получить) MULTIPLE POSTS

# User Input
	// $author = 'Kaka1';
	// $is_published = true;
	// $id = 2;

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

# FETCH (получить) SINGLE POST

	// $sql = 'SELECT * FROM posts WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['id' => $id]);
	// $post = $stmt->fetch();

	// echo $post->body;


# 	COUNT ROWS IN A TABLE

	// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
	// $stmt->execute([$author]);
	// $postCount = $stmt->rowCount();

	// echo $postCount;

# INSERT DATA
	// $title = 'post 6';
	// $body = 'This is post 5';
	// $author = 'Kevin';

	// $sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);

	// echo 'Post Added';


# UPDATE DATA
	// $id = 1;
	// $body = 'This is UPDATED POST';

	// $sql = 'UPDATE posts SET body = :body WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['body' => $body, 'id' => $id]);

	// echo 'Post Updated';


# DELETE DATA

	// $id = 3;

	// $sql = 'DELETE FROM posts WHERE id = :id';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute(['id' => $id]);

	// echo 'Post Deleted';


# SEARCH DATA

	// $search = "%Post%"; // Case insensitive!
	// $sql = 'SELECT * FROM posts WHERE title LIKE ?';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$search]);
	// $posts = $stmt->fetchAll();

	// foreach ($posts as $post) {
	// 	echo $post->title . '<br>';
	// }

# LIMIT OUTPUT

	// $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable the emulation mode (change the default)
	// $limit = 1;

	// $sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$author, $is_published, $limit]);
	// $posts = $stmt->fetchAll();

	// foreach ($posts as $post) {
	// 	echo $post->title . '<br>';
	// }



##############


	

function hello($login)
{
	global $pdo;

	$sql = 'SELECT * FROM users WHERE login = :login';
	$stmt = $pdo->prepare($sql);
	$stmt->execute(['login' => $login]);

	if (!($current_user = $stmt->fetch(PDO::FETCH_ASSOC)))
	{
		echo "No such user\n"; // Delete
		$stmt->close();
		return NULL;
	}
	return ($current_user);
	//$stmt->close();


}
// echo 'hi';

// $l = 'mrakhman';
$return = hello('mrakhman');
	foreach ($return as $key => $value) {
		echo "$key = $value" . "<br>";
	}


// $u = hello($l)
// echo 'ih';
	// $log = 'mrakhman';
	// $cUser = hello($log);
	// foreach ($cUser as $key => $value) {
	// 	echo "$key = $value" . "<br>";
	// }

//	$stmt->close();



	// $login = 'mrakhman';

	// $sql = 'SELECT * FROM users WHERE login=?';
	// $stmt = $pdo->prepare($sql);
	// $stmt->execute([$login]);

	// if (!($current_user = $stmt->fetch(PDO::FETCH_ASSOC)))
	// {
	// 	echo "No such user\n"; // Delete
	// 	$stmt->close();
	// 	return NULL;
	// }

	// //return ($current_user);
	// // var_dump($current_user);
	// echo "$current_user[login]" . "<br>";
	// foreach ($current_user as $key => $value) {
	// 	echo "$key = $value" . "<br>";
	// }


?>

