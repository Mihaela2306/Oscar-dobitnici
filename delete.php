<?php 
include_once 'pocetna.php';
?>

<html>
	<head>
	<title>Potvrda</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="prompt.css">
</head>


<div class="container">
	<div class="okvir">
		<h2>Potvrdite svoj email i lozinku:</h2> <br>
		<form action="deletus.php" method="post">
		<input type="text" name="uid" placeholder="Email..."> <br><br>
		<input type="password" name="pwd" placeholder="Lozinka..."> <br><br>
		<button type="submit" name="submit">Ok</button>
		</form>
	</div>
</div>


<?php
if(isset($_GET["error"])){
	if($_GET["error"] == "emptyinput"){
		echo '<script>alert("Ispunite sva polja!")</script>';
	}
	if($_GET["error"] == "wronginput"){
		echo '<script>alert("Netočno ispunjena polja.")</script>';
	}
}
?>