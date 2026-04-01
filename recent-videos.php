<?php
	//starting the session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>RECENT Posts - GlombleRollSocial</title>
		<link rel="stylesheet" href="/style.css">
</head>
<body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo.jpg" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
	<h1>RECENT VIDEOS</h1>
    <hr>
	
<?php
require_once 'conn.php';

$user = htmlspecialchars($_GET['user']);

if($user){
    // get list of blogs IDs by a specific user ID
    $query = "SELECT id FROM `videos` WHERE `uploaderID` = :id ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $user);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $post_array = array_column($rows, 'id');
    $idList = implode(',', $post_array);

            // get username from ID
                $query = "SELECT `username` FROM `users` WHERE `id` = :id";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':id', $user);
                $stmt->execute();
                $row = $stmt->fetch();
                $username = $row['username'];

    echo "by user ". $username . " (user ID: " . $user . ") <hr>";
} else {
    echo "from all users <hr>";

    // get list of blogs IDs
    $query = "SELECT id FROM `videos` ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $post_array = array_column($rows, 'id');
    $idList = implode(',', $post_array);
}

for ($x = 0; $x < 10; $x+= 1) {
    $id = $post_array[$x];

    if ($id) {
        $query = "SELECT * FROM `videos` WHERE `id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        $postid = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
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
        echo "<p>" . $description . "</p> <br>";
        echo "<p>Uploaded on: " . $time . "</p>";
        echo "<p>Uploaded by: " . $username . " (user ID: " . $user_id . ")</p>";
        echo "<p>Video ID: " . $postid . "</p> <hr>";
    }
}
?>
	</div>
</body>
