<!DOCTYPE html>
<?php 
//starting the session
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: home.php');
    exit;
}
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
				<!-- Display Login Error message -->
                <?php echo $_SESSION['success'] . "<br>"; ?>

		<a href="sign-up.php">Not a member yet? Register here...</a>
        <p>FYI, if you login, but are still on this screen instead of the dashboard, you *probably* entered the wrong login...</p>
		<br style="clear:both;"/><br />
			<!-- Login Form Starts -->
			<form method="POST" action="login_query.php">	
					<label>Username (case-sensitive)</label>
					<input type="text" name="username" class="form-control" required="required"/>
					<label>Password (obviously case-sensitive)</label>
					<input type="password" name="password" class="form-control" required="required"/>

				<button class="btn btn-primary btn-block" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>	

				<?php
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if(ISSET($_SESSION['error'])){
				?>
				<!-- Display Login Error message -->
                <?php echo $_SESSION['error']?>
				<?php
					//Unsetting the 'error' session after displaying the message. 
					session_unset($_SESSION['error']);
					}
				?>
			<!-- Login Form Ends -->
</body>
</html>
