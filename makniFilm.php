<?php
session_start();
include("dbh.php");

if(isset($_GET["filmId"])){
	$idFilma = $_GET["filmId"];
	$sql = "SELECT * FROM filmovi WHERE id='" . $idFilma ."';";
}else{
	header("Location: ../PROJEKT/film.php?filmId=" . $idFilma . "&promjena=error");
}
$idKorisnika = $_SESSION["id"];

$query = "DELETE FROM korisnik_film WHERE korisnikId='" . $idKorisnika ."' AND filmId = '".$idFilma . "'";
$result = mysqli_query($conn, $query);
	if($result){
		header("Location: ../PROJEKT/film.php?promjena=success&filmId=" . $idFilma . "");
	} else {
		header("Location: ../PROJEKT/film.php?filmId=" . $idFilma . "&promjena=error");
	}

