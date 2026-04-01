<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'conn.php';

    // get post count plus one
    $query = "SELECT COUNT(*) as count FROM `videos`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
    $post_count = $row["count"];
    $post_count = $post_count + 1;
    echo $post_count;

	// Setting variables
	$title = "the new rick rolld " . $post_count;
    $user_id = htmlspecialchars($_SESSION['user_id']);
	
    // prepare image or smth
	$target_dir = "vid/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //echo $imageFileType;
	$temp_file_name = $_FILES["fileToUpload"]["name"];

    // rename file to (post count + 1)
    $file_name = $post_count . "." . $imageFileType;
    //echo $file_name;
    rename($temp_file_name, $file_name);
    //echo $file_name;
	$target_file = $target_dir . basename($file_name);

	$upload_date = date('F j, Y');

    $plik = $_FILES["fileToUpload"]["tmp_name"];
    $hash_check = hash_file('md5', $plik);

	// Check if file already exists
	if ($hash_check != "366264d3f56956267a04eab26666ecec") {
	  echo "That is (probably) NOT the new rick rolld.";
	  $uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "Sorry, file already exists.";
	  $uploadOk = 0;
	}

     // Check file size -- Kept for 30Mb
    if ($_FILES["fileToUpload"]["size"] > 30000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "wmv" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "MP4") {
        echo "Sorry, only wmv, mp4 & avi files are allowed.";
        $uploadOk = 0;
    }

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
                // Insertion Query
                $query = "INSERT INTO `videos` (title, description, uploaderID, time, `url`) VALUES(:title, :description, :uploaderID, :time, :url)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':uploaderID', $user_id);
                $stmt->bindValue(':time', date('Y-m-d H:i:s'));
                $stmt->bindValue(':url', '/vid/lololol.mp4');

	            // Check if the execution of query is success
	            if($stmt->execute()){
		            //setting a 'success' session to save our insertion success message.
		            $_SESSION['success'] = "Video uploaded!";
		            header('location: home.php');
			echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		}
}
?>
