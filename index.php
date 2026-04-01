<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WELCOME TO GlombleRollSocial</title>
		<link rel="stylesheet" href="/style.css">
    </head>
    <body>
		<div class="box">
			<a href="/index.php"><img src="TTWHXD logo.jpg" class="center"></a>
		</div>
		<div class="box" style="margin-bottom:10px;">
			<h1>Welcome to GlombleRollSocial!</h1>
			<p>The best and most safest social media out there :)</p><br>
            <h2>LINKS</h2>
            <ul>
                <li><a href="login.php">Log In</a></li>
                <li><a href="sign-up.php">Sign Up</a></li>
            </ul><br>
            <h1>VIEW FEED</h1>
            <ul>
            <li><a href="/recent-videos.php">Recent Posts [Global]</a></li>
            </ul><br>
			<h1>RULES (follow 'em or die)</h1>
			<ul>
				<li><a href="https://glomble.com/videos/GlombleRoll">Here</a></li>
			</ul>
		</div>
    </body>
</html>
