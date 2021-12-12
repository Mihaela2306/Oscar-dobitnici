<?php include("pocetna.php"); ?>

<html>
	<head>
	<title>Registracija</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="prompt.css">
</head>

<center>

<div class="container">
	<div class="okvir">
		<form action="signupinc.php" method="post">
			<h2> Registrirajte se </h2><br><br>
			<p><input type="text" name="name" placeholder="Ime i prezime..." size="30" /></p><br>
			<p><p><input type="text" name="email" placeholder="Email..." size="30" /></p><br>
			<p><p><input type="text" name="uid" placeholder="Korisničko ime..." size="30" /></p><br>
			<p><p><input type="password" name="pwd" placeholder="Lozinka..." size="30" /></p><br>
			<p><p><input type="password" name="pwdRepeat" placeholder="Ponovite lozinku..." size="30" /></p><br><br>
			<p><button type="submit" name="submit"> Sign up</button>
		</form>
	</div>
</div>

<?php 
if(isset($_GET["error"])){
	if($_GET["error"] == "emptyinput"){
		echo '<script>alert("Ispunite sva polja!")</script>';
	}
	if($_GET["error"] == "invaliduid"){
		echo '<script>alert("Korisničko ime ima nevaljane znakove.")</script>';
	}
	if($_GET["error"] == "invalidemail"){
		echo '<script>alert("Email ne postoji.")</script>';
	}
	if($_GET["error"] == "passwordsdontmatch"){
		echo '<script>alert("Lozinke se ne podudaraju!")</script>';
	}
	if($_GET["error"] == "stmtfailed"){
		echo '<script>alert("Nešto je pošlo po zlu, probajte ponovno.")</script>';
	}
	if($_GET["error"] == "usernametaken"){
		echo '<script>alert("Korisničko ime je zauzeto!")</script>';
	}
	if($_GET["error"] == "none"){
		echo '<script>alert("Uspješno ste upisani!")</script>';
	}
}
?>