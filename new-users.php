<?php
	//starting the session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>RECENT BLOGS - TTWHXD</title>
		<link rel="stylesheet" href="/style.css">
</head>
<body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo 2.png" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
	<h1>NEWEST USERS</h1>
    <hr>
	
<?php
require_once 'conn.php';

$query = "SELECT COUNT(*) as count FROM `users`";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$post_count = $row["count"];
	
for ($x = $post_count; $x >= $post_count-10; $x+= -1) {
	$user_id = $x;
        

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
        echo "<p>User ID: " . $user_id . "</p> <hr>";
}
?>
	</div>
</body>
