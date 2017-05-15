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
			<h2><p>Curierat de colete și documente </p>în Chișinău și în toată Moldova </h2>
		</div>
	</div>
	<div class="log">
		<div id="poz">
			<img id="logo" src="Pictures/imagine.jpg" width="254" height="186">
		</div>

	</div>

	<hr id="lin">
	</div>

	<form class="for" action="calc.php" method="post">
		<div id="cal0">Timpul trimiterii</div>
		<div id="cal">
			<input type="radio" name="tipcom" value="u_zile" checked>Urmatoarele zile
			<input type="radio" name="tipcom" value="a_zi">In aceiasi zi
			<input type="radio" name="tipcom" value="3h">3h</div>
			
		<br>
		<br>
		<div id="calcu"> Retur</div>
		<div id="calcul">
			<input type="radio" name="Retur" value="Da">Da
			<input type="radio" name="Retur" value="Nu">Nu</div>
		<br>
		<br>
		<div id="cal1"> Greutatea coletului</div>
		<div id="cal2">
			<select name="greutate">
				<option>0-2 kg</option>
				<option>2-5 kg</option>
				<option>5-10 kg</option>
				<option>10-20 kg</option>
				<option>>20 kg</option>
			</select>
		</div>

		<br>
		<br>
		<div id="cal12"> Necesitati de livrare</div>
		<div id="cal3">
			<input align="right" type="checkbox" name="op1" value="cutie"> +cutie
			<input align="right" type="checkbox" name="op2" value="fragil"> fragil</div>
		<br>
		<br>

		<div id="cal4"> Zona livrarii</div>
		<div id="cal5">
			<select name="Regiuni">
				<option value="s.Riscani">Sectorul Riscani</option>
				<option value="s.Botanica">Sectorul Botanica</option>
				<option value="s.Centru">Sectorul Centru</option>
				<option value="s.Buiucani">Sectorul Buiucani</option>
				<option value="s.Ciocana">Sectorul Ciocana</option>
				<option value="R.Rezina">Raionul Rerina</option>
				<option value="Mun.Balti">Municipiul Balt</option>
				<option value="R.Floresti">Raionul Floresti</option>

			</select>
		</div>
		<h2 id="calcul5"> </h2>
		<div id="but">
			<input type="button" name="davinci" id="help6" onclick="$.post('calc.php', $('.for').serialize(), function(data){ $('#calcul5').html(data) })" value="Calcul">
	        <div class="ajutor2" >Pentru a calcula aproxiamtiv prețul  tastați acest buton</div>
		</div>
		<div class="buton7">
			<input type="submit"  name="davinci" id="help5" value="confirma">
			<div class="ajutor1" >Pentru a confirma comanda și a trece la pagina de înregistrare tastați acest buton</div>
		</div>
		
	</form>
<span><img id="help" src="Pictures/help.jpg" widh="20" height="20"></span>
<div class="ajutor" >În cît tinp doriti ca coletul să fie expediat, selectați opțiunea dorită</div>
<span><img id="help1" src="Pictures/help.jpg" widh="20" height="20"></span>
<div class="ajutor" >Cu întoarcere de documente sau alte colete către angajator, selectați opțiunea dorită </div>
<span><img id="help2" src="Pictures/help.jpg" widh="20" height="20"></span>
<div class="ajutor" >Greutatea este necesară pentru a selecta cel mai potrivit tip de transport</div>
<span><img id="help3" src="Pictures/help.jpg" widh="20" height="20"></span>
<div class="ajutor" >Dacă aveți nevoie de cutie pentru coletul dumneavoastra sau aveți un colet cu obiecte fragile</div>
<span><img id="help4" src="Pictures/help.jpg" widh="20" height="20"></span>
<div class="ajutor" >Alege'i sectorul de livrare din opțiunile propuse</div>
</body>

</html>
