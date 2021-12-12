<html>
	<head>
	<title>Promijenite profilnu</title>
	<meta name="viewport" content="width=device-width, initial scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="izmjenaProfilne.css">
</head>

<?php 
	include_once 'pocetna.php';
	include_once 'dbh.php';
?>

<form action="upload.php" method="post">

<body>
	<div class="container">
		
		<div class="naslov">
			Izaberite novu profilnu sliku!
		</div>

		<div class="img1">
			<input type="radio" name="picture" id="bong-ho" value="bong-ho"><label for="bong-ho"><img src="https://pyxis.nymag.com/v1/imgs/c7e/71c/6959d67fe548e6bbab3a9f01bfdb783d1b-10-bong-joon-ho-oscars-2.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="img2">
			<input type="radio" name="picture" id="godfather" value="godfather"><label for="godfather"><img src="https://c-sf.smule.com/rs-s76/arr/dc/c5/c744c1b1-4646-4c4a-bb20-dbe985e3d62a.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="img3">
			<input type="radio" name="picture" id="jodie-foster" value="jodie-foster"><label for="jodie-foster"><img src="https://c-sf.smule.com/rs-s38/arr/bb/f4/b2d040e4-c7cd-42fb-b8da-699f63e734b1.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="img4">
			<input type="radio" name="picture" id="julie-andrews" value="julie-andrews"><label for="julie-andrews"><img src="https://pbs.twimg.com/profile_images/650047932650102784/4mLFCCCB_400x400.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="img5">
			<input type="radio" name="picture" id="forrest-gump" value="forrest-gump"><label for="forrest-gump"><img src="https://pbs.twimg.com/profile_images/378800000631886908/25627aeaadba05cd16a9a237af9c766c.jpeg" height ="100" width= "100"></label><br>
		</div>

		<div class="img6">
			<input type="radio" name="picture" id="titanic" value="titanic"><label for="titanic"><img src="https://1.bp.blogspot.com/-cuezepIXQXw/XzbwxVRYVzI/AAAAAAAAAAU/kAKBYK637ZIMzUuKJS3VOoG4h324tXpmgCLcBGAsYHQ/w256-h256/cover-titanic-full-movie-in-bangla-version-16.jpeg" height ="100" width= "100"></label><br>
		</div>

		<div class="img7">
			<input type="radio" name="picture" id="russell-crowe" value="russell-crowe"><label for="russell-crowe"><img src="https://pbs.twimg.com/profile_images/664790863759863808/4N_rm8YI_400x400.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="img8">
			<input type="radio" name="picture" id="casablanca" value="casablanca"><label for="casablanca"><img src="https://avatarfiles.alphacoders.com/717/thumb-71741.jpg" height ="100" width= "100"></label><br>
		</div>

		<div class="spremi">
			<button type="submit" name="submit">Spremi promjenu</button>
		</div>

	</div>
</body>
</form>