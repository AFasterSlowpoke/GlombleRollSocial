<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "skull";
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GlombleRollSocial - DASHBOARD</title>
		<link rel="stylesheet" href="/style.css">
    </head>
    <body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo.jpg" class="center"></a>
		</div>

		<div class="box">
			<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

			<p>You are logged in. user id: <?php echo $_SESSION['user_id']; ?></p>

            <p><?php echo htmlspecialchars($_SESSION['success']); ?></p>
			
            <hr>

            <h1>VIEW FEED</h1>
            <ul>
            <li><a href="/recent-videos.php">Recent Posts [Global]</a></li>
            </ul><br>

            <ul>
            <li><a href="/new-users.php">Newest Users</a></li>
            </ul><br>


            <h2>LOOKUP PROFILE [BY ID]</h2>
			<form action="retrieve-user.php" method="get" enctype="multipart/form-data">
				User ID:<br>
				<input type="number" name="user" id="user">
				<br><br>
				<input type="submit" value="Submit!" name="submit">
			</form><br>

            <h2>LOOKUP POST [BY ID]</h2>
			<form action="retrieve-post.php" method="get" enctype="multipart/form-data">
				Post ID:<br>
				<input type="number" name="id" id="id">
				<br><br>
				<input type="submit" value="Submit!" name="submit">
			</form><br>
		</div>

		<div class="box">
			<h1>VIEW PROFILE</h1>
			<?php
            echo "<a href='/retrieve-user.php?user=" . $_SESSION['user_id'] . "'>View your profile</a>";
            ?><br><br>
		</div>

		<div class="box">
            <h1>UPLOAD STUFF</h1>
			<h2>UPLOAD VIDEO</h2>
			<form action="upload-video.php" method="post" enctype="multipart/form-data">
				Select video to upload (max. 30 MB):<br>
				<input type="file" name="fileToUpload" id="fileToUpload">
				<br><br>
				<input type="submit" value="Submit!" name="submit">
			</form><br>
		</div>

		<div class="box">
			<h1>LOG OUT</h1>
			<a href="logout.php">Log Out</a>
		</div>

		<div class="box" style="margin-bottom:10px;">
            <h1>ADMIN PANEL</h1>
            <h2>DELETE POST</h2>
			<form action="delete-post.php" method="post" enctype="multipart/form-data">
				Post ID:<br>
				<input type="number" name="id" id="id">
				<br><br>
				Type:<br>
				  <select name="type" id="type">
                    <option value="blog">Blogs</option>
                    <option value="image">Images</option>
                    <option value="video">Videos</option>
                    <option value="swf">.SWFs</option>
                  </select>
				<br><br>
				<input type="submit" value="Submit!" name="submit">
			</form><br>
            <h2>DELETE USER</h2>
			<form action="delete-post.php" method="post" enctype="multipart/form-data">
				Post ID:<br>
				<input type="number" name="id" id="id">
				<br><br>
				Type:<br>
				  <select name="type" id="type">
                    <option value="blog">Blogs</option>
                    <option value="image">Images</option>
                    <option value="video">Videos</option>
                    <option value="swf">.SWFs</option>
                  </select>
				<br><br>
				<input type="submit" value="Submit!" name="submit">
			</form><br>
        </div>
</body>
</html>
