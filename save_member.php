<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'conn.php';
	
	if(ISSET($_POST['register'])){
    $query = "SELECT COUNT(*) as count FROM `users`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    $post_count = $row["count"];
    $post_count = $post_count + 1;

        $image = "/NOPFP.png";

		// Setting variables
		$username = "GlombleRoller" . $post_count;
		$password = htmlspecialchars($_POST['password']);
        $conjoined_password = $username . $password;
        $encrypted_password = hash('sha256', $conjoined_password);

		    // Insertion Query
		    $query = "INSERT INTO `users` (username, password, time, image) VALUES(:username, :password, :time, :image)";
		    $stmt = $conn->prepare($query);
		    $stmt->bindParam(':username', $username);
		    $stmt->bindParam(':password', $encrypted_password);
            $stmt->bindValue(':time', date('Y-m-d H:i:s'));
		    $stmt->bindParam(':image', $image);

		// Check if the execution of query is success
		if($stmt->execute()){
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Successfully created an account! Your username is: " . $username;

			//redirecting to the index.php 
			header('location: login.php');
		} else {
			//setting a 'success' session to save our insertion success message.
			$_SESSION['error'] = "could not create account";

			//redirecting to the index.php 
			header('location: sign-up.php');
        }

	}
?>
