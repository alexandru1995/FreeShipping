<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="calculator";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$nume=filter_input(INPUT_POST,'nume_client');	
$prenume=filter_input(INPUT_POST,'prenume_client');	
$gen=filter_input(INPUT_POST,'gen');	
$nr_tel=filter_input(INPUT_POST,'nr_telefon');	
$email=filter_input(INPUT_POST,'email');	
$adresa=filter_input(INPUT_POST,'adresa');
if(!empty($nume) && !empty($prenume) && !empty($nr_tel) && !empty($email) && !empty($adresa)){
$sql = "INSERT INTO `calculator`.`client` (`id_client`, `nume_client`, `prenume_client`, `gen`, `nr_telefon`, `email`, `adresa`) 
VALUES (NULL, '$nume', '$prenume', '$gen', '$nr_tel', '$email', '$adresa');";
$result = mysqli_query($conn,$sql);}

$conn->close();
header( 'Location: inregistrare.php', true, 301 );
?>



else
{
   ?>
   <div id="error3">
   <h2>Ati introdus datele gresit</h2>
   </div>
   <?php
}