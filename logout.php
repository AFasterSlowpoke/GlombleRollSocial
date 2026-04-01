<?php
session_start();
session_destroy();
header('Location: login.php');
exit;
?>
<html lang="en">
	<head>
		<title>hi</title>
	</head>
	<body>
		<p>you've been logged out.</p>
	</body>
</html>