<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="calculator";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "DELETE FROM `client` WHERE id_neci=".$_GET["id"];
	$conn->query($sql);	
		
	$sql = "DELETE FROM `necesitati1` WHERE id_neci=".$_GET["id"];
	$conn->query($sql);	

	$conn->close();
?>