<?php
	//starting the session
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <title>DELETE POST - TTWHXD</title>
		<link rel="stylesheet" href="/style.css">
</head>
<body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo 2.png" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
<?php
require_once 'conn.php';

$user_id = $_SESSION['user_id'];
$post_id = htmlspecialchars($_POST['id']);

echo $post_id;

    $query = "SELECT acc_type FROM `users` WHERE `id` = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $user_id);
    $stmt->execute();
    $row = $stmt->fetch();
    $acctype = $row['acc_type'];

    if ($acctype != "admin") {
        echo "you are not an admin";
    } else {
        echo "you are an admin";
        $query = "DELETE FROM blogs WHERE `id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $post_id);
        if ( $stmt->execute() ) {
            echo "deleted post";
        } else {
            echo "not deleted";
        }
    }?>
	</div>
</body>
