<?php 
include_once 'pocetna.php';
?>

<html>
	<head>
	<title>Log In</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="prompt.css">
</head>

<div class="container">
	<div class="okvir">
		<h2>Ulogirajte se</h2><br>
		<form action="logininc.php" method="post">
		<input type="text" name="uid" placeholder="Korisničko ime/Email..." style="margin-bottom:10px" size="30"> <br>
		<input type="password" name="pwd" placeholder="Lozinka..." size="30"> <br><br>
		<button type="submit" name="submit">Log in</button>
		</form>
	</div>
</div>



<?php
if(isset($_GET["error"])){
	if($_GET["error"] == "emptyinput"){
		echo '<script>alert("Ispunite sva polja!")</script>';
	}
	if($_GET["error"] == "wronglogin"){
		echo '<script>alert("Netočno ispunjena polja.")</script>';
	}
}
?>