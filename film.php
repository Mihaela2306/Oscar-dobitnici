<?php
include_once 'dbh.php';
include_once 'pocetna.php';
include_once 'funkcije.php';

if(isset($_GET["filmId"])){
	$ID = $_GET["filmId"];
	$sql = "SELECT * FROM filmovi WHERE id='" . $ID ."'";
}else{
	header("Location: ../index.php");
}

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	$row = mysqli_fetch_assoc($result);
	
	
	if(isset($_POST['sub'])){
		if (isset($_POST['ratingFilma'])){
			$ratingFilma = $_POST['ratingFilma'];
			if ($ratingFilma == "" || $ratingFilma == null){
				echo "<script>alert('Upišite ocjenu za film!')</script>";
			} else if ($ratingFilma < 1 || $ratingFilma > 10){
				echo "<script>alert('Nevažeća ocjena upisana!')</script>";
			} else {
				header("Location: ../dodajFilm.php?filmId=" . $ID . "&rating=" . $ratingFilma);
			}
		}
	}
?>

<html>
	<head>
	<title><?php echo $row['imeFilma']; ?></title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="film.css">
</head>

<body>
	<div class="container">

		<div class="bg"></div>

		<div class="header"><?php echo $row['imeFilma']; ?></div>

		<div class="poster">
			 <img src="<?php echo $row['slikaFilma']; ?>"> 
		</div>
		
		<div class="film">
			Godina: <?php echo $row['godinaFilma']; ?>  <br>
			Žanr: <?php echo $row['zanrFilma1']; if(!($row['zanrFilma2'] == "")){
				echo ", " . $row['zanrFilma2'];
			}
			?> <br>
			Trajanje: <?php echo $row['trajanjeFilma']; ?> <br>
			Glumci: <?php echo $row['glavniFilma']; ?> <br>
			Redatelj: <?php echo $row['redateljFilma']; ?> <br>
			Scenaristi: <?php echo $row['scenaristiFilma']; ?> <br>
			Zemlja: <?php echo $row['zemljaFilma']; ?> <br>
			Foršpan: <?php echo "<a href='" .$row['trailerFilma'] . "'>Link na trailer filma</a>"; ?> <br>
			IMDB ocjena: <?php echo $row['rimdbFilma']; ?>/10 <br>
			 <?php 
			echo "Srednja ocjena svih korisnika: ";
			$query = "SELECT rating FROM korisnik_film WHERE filmId='" . $ID ."'";
			$rezultat = mysqli_query($conn, $query);
			$brojac = 0;
			$ratingZbroj = 0;
			
			while ($red = mysqli_fetch_array($rezultat, MYSQLI_ASSOC)){
				$brojac = $brojac + 1;
				$ratingZbroj = $ratingZbroj + $red['rating'];
			}
			
			if (!$brojac){
				echo " 0/10<br>";
			} else {
				$avg = $ratingZbroj / $brojac;
				$avgfmt = number_format($avg, 1);
				echo " " . $avgfmt . "/10<br>";
			}		
				
			if(isset($_SESSION["id"])){ //ako je korisnik ulogiran ispisat će njegovu ocjenu filma
					echo"Tvoja ocjena: ";
				$rating = ratingKorisnika($ID, $_SESSION["id"]);
				if($rating == 0){
					echo "Niste ocijenili ovaj film.";
				}else{
					echo "" . $rating . "";
				}				
			}?>
			<br><br>
			<?php
			if(isset($_GET["dodan"])){
				if($_GET["dodan"] == 'success'){
					echo "<p>Film je dodan na Vašu listu pogledanih filmova!</p>";
					echo "<button><a href='makniFilm.php?filmId=".$ID."'>Makni film</a></button>";
				} else if($_GET["dodan"] == 'error'){
						echo "<p>Došlo je do neke pogreške tijekom dodavanja ovog filma na Vašu listu pogledanih filmova.</p>";
				}
			}else if(isset($_GET["promjena"])){
				if($_GET["promjena"] == 'success'){
					echo "<p>Film je izbrisan iz Vaše liste pogledanih filmova!</p>";
					echo "<form method='post'>";
						echo "Ocijenite film (1 - 10):<input type='number' min = '1' max='10' name='ratingFilma'>";
						echo "<button type='submit' value='Dodaj film' name='sub'>Dodaj film</button>";
						echo "</form>";
					
				} else if($_GET["promjena"] == 'error'){
						echo "<p>Došlo je do neke pogreške tijekom brisanja ovog filma iz Vaše liste pogledanih filmova.</p>";
				}
			}
			else {
				if(!(isset($_SESSION["id"]))){ //ako korisnik nije ulogiran
					echo "Ulogirajte se u svoj korisnički račun da bi dodavali/micali filmove sa svoje liste.";
				}
				else{
					$pogledano = provjeraPogledano($ID, $_SESSION["id"]);
					if($pogledano == 1){
						echo "Ovaj ste film pogledali.       ";
						echo "<button><a href='makniFilm.php?filmId=".$ID."'>Makni film</a></button>";
					}else{
						echo "<form method='post'>";
						echo "Ocijenite film (1 - 10):<input type='number' min='1' max='10' name='ratingFilma'>";
						echo "<button type='submit' value='Dodaj film' name='sub'>Dodaj film</button>";
						echo "</form>";
					}
				}
			} 
			?>
			 
		</div>

		<div class="opis">
			Opis: <br><?php echo $row['opisFilma']; ?>
		</div>
	</div>

</body>
</html>
