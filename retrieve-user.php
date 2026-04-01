<?php
	//starting the session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>VIEW USER - TTWHXD</title>
		<link rel="stylesheet" href="/style.css">
</head>
<body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo.jpg" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
<?php
require_once 'conn.php';

$user_id = htmlspecialchars($_GET['user']);

    $query = "SELECT * FROM `users` WHERE `id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $row = $stmt->fetch();
    $username = $row['username'];
    $image = $row['image'];
    $biography = $row['biography'];
    $time = $row['time'];

    echo "<h1>" . $username . "</h1>";
    echo "<img src='" . $image . "'>";
    echo "<p>" . $biography . "</p> <br>";
    echo "<p>Joined TTWHXD on: " . $time . "</p>";
    echo "<p>User ID: " . $user_id . "</p><br>";
    echo "<a href='/recent-blogs.php?user=" . $user_id . "'> View their recent blogs </a>";
?>
	</div>
</body>
