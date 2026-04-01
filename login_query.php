<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['login'])){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
        $conjoined_password = $username . $password;
        $encrypted_password = hash('sha256', $conjoined_password);
		
		$query = "SELECT COUNT(*) as count FROM users WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $encrypted_password);
		$stmt->execute();
		$row = $stmt->fetch();

		$count = $row['count'];

		if($count > 0){
            //this shit took an embarassingly long time to get it to actually work, and it's ALL because i typed id as ID when it should have been id all along im such a dumb fuck
            $_SESSION['username'] = $username;
		    $query = "SELECT id FROM `users` WHERE `username` = :username";
		    $stmt = $conn->prepare($query);
		    $stmt->bindParam(':username', $username);
		    $stmt->execute();
		    $row = $stmt->fetch();
            $user_id = $row['id'];
            echo $username;
            echo $user_id;
            $_SESSION['user_id'] = $user_id;
            echo "login success";
			header('location:home.php');
		}else{
			$_SESSION['error'] = "Invalid username or password!";
			header('location:login.php');
		}
	}
?>
