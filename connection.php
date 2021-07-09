<?php

	$servername = "localhost";
    $username = "root";
    $password = "";
	$database = "sparksbank";

// Create connection
    $conn = mysqli_connect($servername, $username, $password,$database);

	if(!$conn){
		die("Unable to connect to the database. Please try again later!");
	}
?>