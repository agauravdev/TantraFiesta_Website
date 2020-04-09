<?php
	$servername = "localhost";
	$dbusername = "gaurav";
	$password = "prateek";
	$database = "tantra";

	// Create connection
	$conn = new mysqli($servername, $dbusername, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: Contact +919819682830" . $conn->connect_error);
	}
	
?> 