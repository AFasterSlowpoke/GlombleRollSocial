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
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
		<!-- Link for redirecting to Login Page -->
		<a href="login.php">Already a member? Log in here...</a>
            <p><?php echo htmlspecialchars($_SESSION['error']); ?></p>
			<!-- Registration Form start -->
			<form method="POST" action="save_member.php">	
				<label>Your username will be automatically generated for you.</label><br>
				<label>Password [Use a secure and unique password and KEEP IT STORED SAFELY. There is currently no automatic password reset. There's nothing stopping you from using 1234 but if you get hacked because of that then that's your loss]</label><br>
				<input type="password" name="password" class="form-control" required="required"/>
                <br><br>
				<?php
					//checking if the session 'success' is set. Success session is the message that the credetials are successfully saved.
					if(ISSET($_SESSION['success'])){
				?>
				<!-- Display registration success message -->
				<div class="alert alert-success"><?php echo $_SESSION['success']?></div>
				<?php
					//Unsetting the 'success' session after displaying the message. 
					unset($_SESSION['success']);
					}
				?>
				<button class="btn btn-primary btn-block" name="register"><span class="glyphicon glyphicon-save"></span> SIGN ME UP!</button>
			</form>	
			<!-- Registration Form end -->
</body>
</html>
