<?php
	session_start();
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>
	<p>Oscar filmovi</p>
	<ul>
		<li><a href="poc.php">Početna</a> </li>
		
		<?php
			if(isset($_SESSION["id"])){
				echo "<li><a href='profil.php'>Profil</a> </li>";
				echo "<li><a href='logout.php'>Log out</a> </li>";
			}else{
				echo "<li><a href='signup.php'>Sign up</a> </li>";
				echo "<li><a href='login.php'>Log in</a> </li>";
			}
		?>
		<li><a href="kontakt.php">Kontakt</a> </li>
		<?php
			if(isset($_SESSION["id"])){
				echo "<li><a href='#'>Postavke</a>";
				echo "<ul>";
				echo "<li><a href='promjenauid.php'>Promjena korisničkog imena</a></li>";
				echo "<li><a href='brisanjeProfila.php'>Brisanje profila</a></li>";
				echo "	</ul>";
				echo "</li>";
			}
		?>
	</ul>
</nav>
</body>
</html>