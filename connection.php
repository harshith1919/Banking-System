<?php

	$servername = "us-cdbr-east-04.cleardb.com";
    $username = "bc4a3a03d60a75";
    $password = "82a03c7a";
	$database = "sparksbank";

// Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);

	if(!$conn){
		die("Unable to connect to the database. Please try again later!");
	}
?>
