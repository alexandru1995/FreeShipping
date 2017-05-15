

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

$val=filter_input(INPUT_POST,'greutate');
	
$sql = "SELECT * from greutate where Nume_produs like '$val'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $nume_produs=$row["Nume_produs"];
		$pret=$row["pret"];
		//echo $nume_produs."----".$pret." lei";
    }
} else {
    echo "0 results";
}



$timp=filter_input(INPUT_POST,'tipcom');
$sql = "SELECT * from timpul_trimiterii where urgenta like '$timp'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
        $urgenta=$row["urgenta"];
		$pret1=$row["pret"];
		//echo $urgenta."----".$pret1." lei";
    }
} else {
    echo "0 results";
}


$neci=filter_input(INPUT_POST,'op1');
$sql = "SELECT * from necesitati where tip_colet like '$neci'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
        $tip_colet=$row["tip_colet"];
		$pret2=$row["pret"];
		//echo $tip_colet."----".$pret2." lei";
    }
} else {
    echo "0 results";
}


$nec=filter_input(INPUT_POST,'op2');
$sql = "SELECT * from necesitati where tip_colet like '$nec'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
        $tip_colet=$row["tip_colet"];
		$pret3=$row["pret"];
		//echo $tip_colet."----".$pret3." lei";
    }
} else {
    echo "0 results";
}


$retur=filter_input(INPUT_POST,'Retur');
$sql = "SELECT * from retur where situatie like '$retur'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
        $situatie=$row["situatie"];
		$pret4=$row["pret"];
		//echo $situatie."----".$pret4." lei";
    }
} else {
    echo "0 results";
}


$retur=filter_input(INPUT_POST,'Regiuni');
$sql = "SELECT * from sectoare where nume_sector like '$retur'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
        $nume_sector=$row["nume_sector"];
		$pret5=$row["pret"];
		//echo $nume_sector."----".$pret5." lei";
    }
} else {
    echo "0 results";
}

echo("Pretul este ".($pret+$pret1+$pret2+$pret3+$pret4+$pret5)." lei");


$nume=filter_input(INPUT_POST,'nume');
$parola=filter_input(INPUT_POST,'parola');
$sql = "SELECT * from administrator where login like '$nume' and larola like '$parola'";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		//echo"<br>";
       // $nume_sector=$row["nume_sector"];
		//$pret5=$row["pret"];
		print_r($row);
    }
} else {
    echo "0 results";
}



$conn->close();
?> 