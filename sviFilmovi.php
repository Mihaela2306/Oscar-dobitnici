<html>
<head>
	<title>Pretraga</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="sviFilmovi.css">
</head>

<?php
include_once 'dbh.php';
include_once 'pocetna.php';

if(isset($_POST["submit"])) {
    $tekst = $_POST["search"];
    $sql = "SELECT * FROM filmovi WHERE imeFilma LIKE '% ".$tekst."%' OR imeFilma LIKE '".$tekst."%' OR imeFilma LIKE '%".$tekst."' ORDER BY godinaFilma DESC;";
}
else if(isset($_GET["zanr"])){
	if($_GET["zanr"] == "Drama"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Drama' OR zanrFilma2 = 'Drama' ORDER BY godinaFilma DESC;";
	} 
	if($_GET["zanr"] == "Komedija"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Komedija' OR zanrFilma2 ='Komedija' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Biografija"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Biografija' OR zanrFilma2 ='Biografija' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Avantura"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Avantura' OR zanrFilma2 ='Avantura' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Krimi"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Krimi' OR zanrFilma2 ='Krimi' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Akcija"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Akcija' OR zanrFilma2 ='Akcija' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Sport"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Sport' OR zanrFilma2 ='Sport' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Kaubojski_film"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Kaubojski film' OR zanrFilma2 ='Kaubojski film' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Ratni_film"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Ratni film' OR zanrFilma2 ='Ratni film' ORDER BY godinaFilma DESC;";
	}
	if($_GET["zanr"] == "Mjuzikl"){
		$sql = "SELECT * FROM filmovi WHERE zanrFilma1 = 'Mjuzikl' OR zanrFilma2 ='Mjuzikl' ORDER BY godinaFilma DESC;";
	}
} 
else if(isset($_GET["abc"])){
	if($_GET["abc"] == "nor"){
		$sql = "SELECT * FROM filmovi ORDER BY imeFilma ASC;";  //ime filma abecedno
	}
	if($_GET["abc"] == "obr"){
		$sql = "SELECT * FROM filmovi ORDER BY imeFilma DESC;"; //ime filma obrnutom abecedom
	}
}
else if(isset($_GET["god"])){
	if($_GET["god"] == "1920"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1930 AND godinaFilma > 1919 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1930"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1940 AND godinaFilma > 1929 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1940"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1950 AND godinaFilma > 1939 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1950"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1960 AND godinaFilma > 1949 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1960"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1970 AND godinaFilma > 1959 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1970"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1980 AND godinaFilma > 1969 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1980"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 1990 AND godinaFilma > 1979 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "1990"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 2000 AND godinaFilma > 1989 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "2000"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 2010 AND godinaFilma > 1999 )ORDER BY godinaFilma ASC;";
	}
	if($_GET["god"] == "2010"){
		$sql = "SELECT * FROM filmovi WHERE (godinaFilma < 2020 AND godinaFilma > 2009 )ORDER BY godinaFilma ASC;";
	}
}
else{
	$sql = "SELECT * FROM filmovi ORDER BY godinaFilma DESC;";
}

	$result = $conn->query($sql);
	if(!($result->num_rows > 0)){ //samo u slučaju pretrage se ovo može dogoditi
		echo "<div class='container'>";
		echo "<div class='okvir'>";
		echo "<div class='button'>";
		echo "<a href='http://localhost/PROJEKT/poc.php'>Ne postoji film pod ovim upitom! Odi natrag.</a>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
?>

<body>
	<div class="container">
		<div class="okvir">
			<?php 
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					echo "<div class='film'>";
					?>
					<a href="http://localhost/PROJEKT/film.php?filmId=<?php echo $row['id']?>"><b> <?php echo $row['imeFilma']?></b><br>
					
					<?php
					echo "<small>".$row['redateljFilma']."</small><br>";
					echo "<small>".$row['godinaFilma']."</small>";
					echo "</div>";
					?>
					</a>
					<?php
				}
			}
		?>
		</div>
	</div>

</body>
</html>