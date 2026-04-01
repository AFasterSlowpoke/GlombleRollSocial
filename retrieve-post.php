<?php
	//starting the session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>Retrieve recent post - GlombleRollSocial</title>
		<link rel="stylesheet" href="/style.css">
</head>
<body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo.jpg" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
	<h1>RETRIEVE POST</h1>
    <hr>
	
<?php
require_once 'conn.php';

$id = htmlspecialchars($_GET['id']);

    if ($id) {
        $query = "SELECT * FROM `videos` WHERE `id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $postid = $row['id'];
        $title = $row['title'];
        $time = $row['time'];
        $video = $row['url'];

            $user_id = $row['uploaderID'];
            $query = "SELECT `username` FROM `users` WHERE `id` = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();
            $row = $stmt->fetch();
            $username = $row['username'];

        echo "<h1>" . $title . "</h1>";
        echo "<video width='640' height='360' controls>
      <source src='" . $video . "'type='video/mp4'> </video>";
        echo "<p>Uploaded on: " . $time . "</p>";
        echo "<p>Uploaded by: " . $username . " (user ID: " . $user_id . ")</p>";
        echo "<p>Video ID: " . $postid . "</p> <hr>";
    }
?>
	</div>
</body>
