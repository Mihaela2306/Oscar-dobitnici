<?php
session_start();
include("dbh.php");

if(isset($_GET["filmId"]) && isset($_GET["rating"])){
	$idFilma = $_GET["filmId"];
	$rating = $_GET["rating"];
	$sql = "SELECT * FROM filmovi WHERE id='" . $idFilma ."';";
}else{
	header("Location: ../film.php?filmId=" . $idFilma . "&dodan=error");
}
$idKorisnika = $_SESSION["id"];

$query = "INSERT INTO korisnik_film (korisnikId, filmId, rating) VALUES ('$idKorisnika', '$idFilma', '$rating')"; 
$result = mysqli_query($conn, $query);

header("Location: ../film.php?dodan=success&filmId=" . $idFilma . "");
