<?php
	include_once 'pocetna.php';
?>

<html>
<head>
	<title>Dobrodošli</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="poc.css">
</head>

<body>
	<div class="container">
		<div class="uvod">
			<p style="font-size:20px">Jeste li se ikada zapitali koliko ste klasika filmske umjetnosti pogledali? Ako jeste, ovo je stranica za Vas! Od davne 1928. pa sve do danas, sakupili smo sve dobitnike nagrade Oscar za najbolji film. Pregledajte ih po godini ili prema žanru, dodajte ih svojoj listi i saznajte koliki ste filmofil!</p>
		</div>

		<div class="svi">
			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php">Svi filmovi</a>
		</div>

<?php 
require_once 'dbh.php';
$nasumicnaGod = rand(1928, 2019);
$sql = "SELECT * FROM filmovi WHERE godinaFilma='" . $nasumicnaGod ."'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

		echo "<div class='random'>";
		?>
		<a href="https://oscar-mihaela.herokuapp.com/film.php?filmId=<?php echo $row['id']?>">Nasumični odabir</a>
		</div>

		<div class="dropdown">
 			<button class="dropbtn">Desetljeća</button>
  			<div class="dropdown-content">
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1920">1920-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1930">1930-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1940">1940-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1950">1950-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1960">1960-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1970">1970-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1980">1980-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=1990">1990-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=2000">2000-te</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?god=2010">2010-te</a>
  			</div>
		</div>

		<div class="dropdown2">
			<button class="dropbtn">Žanrovi</button>
  			<div class="dropdown-content">
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Akcija">Akcija</a> 
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Avantura">Avantura</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Biografija">Biografija</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Drama">Drama</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Kaubojski_film">Kaubojski film</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Komedija">Komedija</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Krimi">Krimi</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Mjuzikl">Mjuzikl</a>
    			<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Ratni_film">Ratni film</a>
				<a href="https://oscar-mihaela.herokuapp.com/sviFilmovi.php?zanr=Sport">Sport</a>
  			</div>
		</div>

		<div class="search">
		<form action="sviFilmovi.php" method="post">
		<input name="search" type="text" placeholder="Pretraži filmove..." size="30">
		<button type="submit" name="submit">Search</button>
		</form>
   		
		</div>
	</div>

</body>
</html>
