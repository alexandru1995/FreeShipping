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

	?>


<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("calculator") or die(mysql_error());

    $query = $_POST['query'];
    $min_length = 1;
    if(strlen($query) >= $min_length){
        $query = htmlspecialchars($query);
        $query = mysql_real_escape_string($query);
        $q = "SELECT * FROM client,necesitati1 WHERE (";
                 if (isset($_POST["cut3"])) {
                      $q .="(`adresa` LIKE '".$query."') OR ";}
                 if(isset($_POST["cut1"])){
                      $q .="( `nume_client` LIKE '".$query."') OR ";}
                 if(isset($_POST["cut2"])){
                      $q .="(`prenume_client` LIKE '".$query."') OR ";}
                      
                if (!isset($_POST["cut3"]) && !isset($_POST["cut1"]) && !isset($_POST["cut2"])) {
                    $q .="(`adresa` LIKE '".$query."') OR ";
                     $q .="( `nume_client` LIKE '".$query."') OR ";
                     $q .="(`prenume_client` LIKE '".$query."') OR ";
                }
        
                $q = rtrim($q, "OR ");
                
                
        // "(`nume_client` LIKE '%".$query."%') OR 
        // (`prenume_client` LIKE '%".$query."%') OR 
        // (`adresa` LIKE '%".$query."%')";
        
        $q .= ") AND client.id_neci=necesitati1.id_neci ";
        $raw_results = mysql_query($q) or die(mysql_error());
        if(mysql_num_rows($raw_results) > 0){
?>
    <table>
      <thead>
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
      </thead>

        <?php
            $i=1;
            while($results = mysql_fetch_array($raw_results)){
             ?>

       <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $results["nume_client"]; ?></td>
    <td><?php echo $results["prenume_client"]; ?></td>
    <td><?php echo $results["gen"]?"Barbat":"Femeie"; ?></td>
    <td><?php echo $results["nr_telefon"]; ?></td>
    <td><?php echo $results["email"]; ?></td>
    <td><?php echo $results["adresa"]; ?></td>
    <td><?php echo $results["pdp"]; ?></td>
    <td><?php echo $results["greutate"].", ".($results["retur"]=="da"?"return":"").", ".$results["cutie"].", ".$results["fragil"].", ";
	if($results["timpul_trimiterii"]=="u_zile")
		echo "urmatoarele zile";
	else if($results["timpul_trimiterii"]=="a_zile")
		echo "aceeasi zi";
	else if($results["timpul_trimiterii"]=="3h")
		echo "trei ore";

	?></td>
	<td><a href="#" onclick="if(confirm('Sigur doriti sa eliminati inscrierea din baza de date')){ $.get('stergere.php?id=<?php echo $results["id_neci"]; ?>', function(){  location.reload(); }) }; void(0)">X</a></td>
  </tr>
    <?php
    $i++;
    }
   ?>
   </table>

    <?php
        }
        else{
            echo"Nici un rezultat";
        }}
            ?>


<?php
$conn->close();
?>
