<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "DB_COFRE_DE_SENHAS";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>