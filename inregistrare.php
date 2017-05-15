<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <title>Companie</title>
    <link rel="stylesheet" href="proiect1.css">
    <meta charset="utf-8" />

</head>

<body>

    <div id="Menu1">
        <div class="butoane">
            <a id="buton1" href="desprenoi.php" class="btn btn-default">
                <h3>Companie</h3>
            </a>
        </div>
        <div class="butoane">
            <a id="buton2" href="Comanda.php" class="btn btn-default">
                <h3>Comanda</h3>
            </a>
        </div>
        <div class="butoane">
            <a id="buton3" href="servicii.php" class="btn btn-default">
                <h3>Servicii</h3>
            </a>
        </div>
        <div class="butoane">
            <a id="buton4" href="asistenta.php" class="btn btn-default">
                <h3>Asistenta clienti</h3>
            </a>
        </div>
        <div class="butoane">
            <a id="buton5" href="contacte.php" class="btn btn-default">
                <h3>Contacte</h3>
            </a>
        </div>
    </div>
    <div class="containere">
       <a href="proiect1.php"> <img id="imag" src="Pictures/buton.jpg" width="254" height="186"  >
       
       </a>
        <div id="cont2">
            <h2><p>Curierat de colete și documente </p>în Chișinău și în toată Moldova </h2>
        </div>
    </div>
    <div class="log">
        <div id="poz">
<img id="logo" width="254" height="186" src="Pictures/imagine.jpg">
</div>
        </form>
    </div>
    <hr id="lin">
    <div class="in">
	<?php

$servername = "localhost";
$username = "root";
$password = "";
$db="calculator";
$conn = new mysqli($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT max(id_neci) from necesitati1 ";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
		$pret6=$row["max(id_neci)"];
		//echo "----".$pret6." lei";
    }
}

$nume=filter_input(INPUT_POST,'nume_client');	
$prenume=filter_input(INPUT_POST,'prenume_client');	
$gen=filter_input(INPUT_POST,'gen');	
$nr_tel=filter_input(INPUT_POST,'nr_telefon');	
$email=filter_input(INPUT_POST,'email');	
$adresa=filter_input(INPUT_POST,'adresa');
$pdp=filter_input(INPUT_POST,'pdp'); 

if(!empty($nume) && !empty($prenume) && !empty($nr_tel) && !empty($email) && !empty($adresa))
{
$sql="INSERT INTO `calculator`.`client` (`id_client`, `nume_client`, `prenume_client`, `gen`, `nr_telefon`, `email`, `adresa`, `pdp`,`id_neci`)
 VALUES (NULL, '$nume', '$prenume', '$gen', '$nr_tel', '$email', '$adresa', '$pdp', '$pret6');";

$result = mysqli_query($conn,$sql);
printf(" %s\n", mysqli_error($conn));
header( 'Location: desprenoi.php', true, 301 );
$conn->close();
 ?>
   <div id="error4">
   <h2>Vati inregistret cu succes</h2>
   </div>
   <?php
   }
else
	if(!empty($_POST))
{
	
   ?>
   
   <div id="error3">
   <h2>Ati introdus datele gresit</h2>
   </div>
   <?php
}


?>
        <form method="post" action="inregistrare.php">
            <div class="form-group">
                <label for="usr">Nume:</label>
                <input type="text" name="nume_client"class="form-control" id="usr">
            </div>
             <div class="form-group">
                <label for="usr">Prenume:</label>
                <input type="text" name="prenume_client" class="form-control" id="usr">
            </div>
            <div class="form-group">
            <label for="usr">Genul:</label><br>
            <input type="radio" name="gen" value="1" checked> Barbat
            <br>
            <input type="radio" name="gen" value="0"> Femeie
            <br>
            </div>
             <div class="form-group">
                <label for="usr">Numarul de telefon:</label>
                <input type="int" name="nr_telefon" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Email:</label>
                <input type="txt" name="email" class="form-control" id="usr">
            </div>
            <div class="form-group">
                <label for="usr">Adresa de pornire:</label>
                <input type="text" name="adresa" class="form-control" id="usr">
            </div>
			<div class="form-group">
                <label for="usr">Punctu de destinatie:</label>
                <input type="text" name="pdp" class="form-control" id="usr">
            </div>
            <p class="submit">
                <input type="submit" name="commit" value="Confirma" >
            </p>
        </form>
    </div>

</body>

</html>