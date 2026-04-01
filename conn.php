<?php
	//check if the database file exists and create a new if not
	if(!is_file('db/lol.sqlite')){
		file_put_contents('db/lol.sqlite', null);
	}
	// connecting the database
	$conn = new PDO('sqlite:lol.sqlite');
	//Setting connection attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Query for creating reating the member table in the database if not exist yet.
	$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
	password VARCHAR(255) UNIQUE NOT NULL,
    time DATETIME,
    acc_type VARCHAR(255),
    image VARCHAR(255))";
	//Executing the query
	$conn->exec($query);

	//Query for creating reating the member table in the database if not exist yet.
	$query = "CREATE TABLE IF NOT EXISTS videos (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    title STRING,
    description STRING,
    uploaderID INT,
    time DATETIME,
    url VARCHAR(255))";
	//Executing the query
	$conn->exec($query);
?>
