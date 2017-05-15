<?php
session_start();
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
$nume=filter_input(INPUT_POST,'nume');
$parola=filter_input(INPUT_POST,'parola');
$sql = "SELECT * from adninistrator where login ='$nume' and larola ='$parola'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$_SESSION["Esti logat"] = "true";
       
		  
		print_r($row);
    }
} 
$conn->close();
header( 'Location: proiect1.php', true, 301 );
  
?>