<?php include("pocetna.php"); ?>

<html>
	<head>
	<title>Promjena</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="prompt.css">
</head>


<div class="container">
	<div class="okvir">
		<center>
		<form action="promjenauidinc.php" method="post">
		<br>
		Upišite Vaše novo korisničko ime:<br><br>
		<p><input type="text" name="uid" size="30" /></p><br>
		<p><button type="submit" name="submit">Potvrdi</button>
		<button><a style="text-decoration: none" href="index.php">Odustani</a></button>
		</form>
	</div>
</div>



<?php 
if(isset($_GET["error"])){
	if($_GET["error"] == "emptyinput"){
		echo '<script>alert("Niste ispunili polje!")</script>';
	}
	if($_GET["error"] == "invaliduid"){
		echo '<script>alert("Korisničko ime ima nevaljane znakove.")</script>';
	}
	if($_GET["error"] == "stmtfailed"){
		echo '<script>alert("Nešto je pošlo po zlu, probajte ponovno.")</script>';
	}
	if($_GET["error"] == "usernametaken"){
		echo '<script>alert("Korisničko ime je zauzeto! Probajte nešto drugo!")</script>';
	}
	if($_GET["error"] == "none"){
		echo '<script>alert("Uspješno ste promijenili svoje korisničko ime!")</script>';
	}
}
?>
