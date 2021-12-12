<html>
	<head>
	<title>Profil</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="profil.css">
</head>

<?php 
	include_once 'pocetna.php';
	include_once 'dbh.php';
?>
<!-- <h2>Korisnički profil</h2> -->

<?php
	$ID = $_SESSION["id"];
	$sql = "SELECT * FROM korisnici WHERE ID ='$ID';";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	$row = mysqli_fetch_assoc($result);

?>

<body>
	<div class="container">

		<div class="slika">
			<img src="<?php echo $row['slikaKorisnika']?>" alt="Profilna slika" style="width:200px;height:200px;">
		</div>

		<div class="promijeni">
			<button><a style="text-decoration: none" href="izmjenaProfilne.php">Promjena slike</a></button>
		</div>

		<div class="opis">
			<p class="big">
			Korisničko ime: <?php echo $row['uidKorisnika']  ?> <br>
			Ime: <?php echo $row['imeKorisnika']  ?><br>
			Email: <?php echo $row['emailKorisnika']  ?> <br>
			Broj pogledanih filmova: 
			<?php
					$sql = "SELECT * FROM korisnik_film WHERE korisnikId ='".$ID."';";
					$result = mysqli_query($conn, $sql);
					if(!$result){
						echo "0";
					}else{

						$resultCheck = mysqli_num_rows($result);
						$br = 0;
						$row = mysqli_fetch_assoc($result);
						if($result->num_rows > 0){
							$br++;
							while($row = $result->fetch_assoc()){
								$br = $br + 1;
							}
						}
						
						echo "".$br."";
					}
			
			echo"<br> Filmski rank: ";
			if($br <= 4){
				echo "Početnik";
			}else if($br >= 5 AND $br <= 12){
				echo "Učenik filmske umjetnosti";
			}
			else if($br >= 13 AND $br <= 24){
				echo "Filmski sladokusac";
			}
			else if($br >= 25 AND $br <= 40){
				echo "Filmofil";
			}
			else if($br >= 41){
				echo "Povjesničar filma";
			}
			echo"<br>";
			?>
			</p>
		</div>

	<div class="lista">
			Lista pogledanih filmova:<br>
			<?php
				 $sql = "SELECT * FROM korisnik_film WHERE korisnikId = '". $ID . "';";

	$result = $conn->query($sql);
?>


			<?php
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					?>
					<a href="http://localhost/PROJEKT/film.php?filmId=<?php echo $row['filmId']?>"><br>
					
					<?php
					$q = "SELECT * FROM filmovi WHERE id = '". $row['filmId'] . "';";
					$results = $conn->query($q);
					$rows = $results->fetch_assoc();
					echo "<div class='film'>";
					echo "".$rows['imeFilma']."<br>";
					echo "<small>".$rows['redateljFilma']."</small><br>";
					echo "<small>".$rows['godinaFilma']."</small>";
					echo "</div>";
					?>
					</a>
					<br>
					<?php
				}
			}
			echo "</div>";
			?>
	  		
	</div>
</body>