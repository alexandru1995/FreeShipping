<!DOCTYPE html>
<html>
	<head>
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script type="text/javascript" src="jquery-2.1.4.min.js"></script>
		<title>Proect de curs</title>
		<link rel="stylesheet" href="proiect1.css">
		<meta charset="utf-8" />
	</head>
	<body>

		<div id="Menu">
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
			<a href="proiect1.php">
			<img id="imag" src="Pictures/buton.jpg" width="254" height="186">
		</a>
			<div id="cont2">
				<h2>
					<p>Curierat de colete și documente </p>
					în Chișinău și în toată Moldova
				</h2>
			</div>
		</div>
		<div class="log">
			<?php
				session_start();

				if (empty($_SESSION["Esti logat"])) {
				?>
			<form method="post" action="logare.php">
				<div class="form-group">
					<label for="usr">Nume administrator:</label>
					<input type="text" name="nume" class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="pwd">parola:</label>
					<input type="password" name="parola" class="form-control" id="pwd">
				</div>
				<p class="remember_me">
					<label>
					<input type="checkbox" name="remember_me" id="remember_me"> Memoreaza aceasta parola
					</label>
				</p>
				<p class="submit">
					<input type="submit" name="commit" value="Login">
				</p>
			</form>
			<?php
				} else {
				?>
				<div id="poz">
					<img id="logo" width="254" height="186" src="Pictures/imagine.jpg">
				</div>
			<div id="exit">
				<a href="exit.php"><input type="submit" name="exit" value="exit"></a>
			</div>
			<form id="cautare16">
			<div id="cauta1">Caută dupa: </div>
			<div id="cauta11" ><input align="right" type="checkbox" name="cut1" value="cutie"> Nume </div>
			<div id="cauta12" ><input align="right" type="checkbox" name="cut2" value="cutie"> Prenume </div>
			<div id="cauta13" ><input align="right" type="checkbox" name="cut3" value="cutie"> Adresa de domiciliu </div>
			<input type="text" name="query" id="stext" style="display: none">
			</form>
			<div class="peste">
    <form id="poter">
		<input type="text" name="query" id="query" placeholder="Search...">
		<button  onclick="ajax_search()" value="search" id="search_buton">Search</button>
	</form>
	<script type='text/javascript'>
	$("#poter #query").on("change", function(){ $("#stext").val(this.value) })
    $(document).ready(function(){
    $("#cap").slideUp();
    $("#search_button").click(function(e){
        e.preventDefault();
        ajax_search();
    });
		$("#poter").submit(function(e){
			e.preventDefault();
			return false;
		})
    // $("#query").keyup(function(e){
    //     e.preventDefault();
    //     ajax_search();
    // });

});
       function ajax_search(){
  $("#cap").show();
  $.post("server1.php", $("#cautare16").serialize(), function(data){
   if (data.length>0){
     $(".tabel").html(data);
   }
  })
}
        </script>
	</div>

			<div id="cap">

			</div>

			<div class="tabel">
			<table >

  <tr>

    <th width="3%">Nr.</th>
    <th width="7%">Nme </th>
    <th width="7%">Prenume</th>
    <th width="5%">Gen</th>
    <th width="10%">Nr de telefon</th>
    <th width="15%">Email</th>
    <th width="15%">Adresa</th>
    <th width="15%">Destinatia</th>
    <th width="33%">Necesitati</th>
    <th></th>
  </tr>
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

$sql ="SELECT * FROM `client`,`necesitati1` WHERE client.id_neci=necesitati1.id_neci;" ;
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) >0) {
    // output data of each row
	$i = 1;
    while($row = mysqli_fetch_assoc($result)) {
		//$_SESSION["Esti logat"] = "true";
?>
  <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row["nume_client"]; ?></td>
    <td><?php echo $row["prenume_client"]; ?></td>
    <td><?php echo $row["gen"]?"Barbat":"Femeie"; ?></td>
    <td><?php echo $row["nr_telefon"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["adresa"]; ?></td>
    <td><?php echo $row["pdp"]; ?></td>
    <td><?php echo $row["greutate"].", ".($row["retur"]=="da"?"return":"").", ".$row["cutie"].", ".$row["fragil"].", ";
	if($row["timpul_trimiterii"]=="u_zile")
		echo "urmatoarele zile";
	else if($row["timpul_trimiterii"]=="a_zile")
		echo "aceeasi zi";
	else if($row["timpul_trimiterii"]=="3h")
		echo "trei ore";

	?></td>
	<td><a href="#" onclick="if(confirm('Sigur doriti sa eliminati inscrierea din baza de date')){ $.get('stergere.php?id=<?php echo $row["id_neci"]; ?>', function(){  location.reload(); }) }; void(0)">X</a></td>
  </tr>
<?php

		//print_r($row);
    }
}
$conn->close();

  ?>

</table>

			</div>
			<?php

				}
				?>
		</div>
		<hr id="lin">
	</body>
</html>
