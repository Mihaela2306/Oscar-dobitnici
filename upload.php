<?php
session_start();

if(isset($_POST["submit"])){ //provjeravamo ako je korisnik došao sa signup stranice, a ne preko URL-a
	$id = $_POST['picture'];
	require_once 'dbh.php';
	$idKorisnika = $_SESSION["id"];
	
if($id == "bong-ho"){
	
	$slika = 'https://pyxis.nymag.com/v1/imgs/c7e/71c/6959d67fe548e6bbab3a9f01bfdb783d1b-10-bong-joon-ho-oscars-2.jpg';
	//$sql = "UPDATE korisnici SET slikaKorisnika='https://pyxis.nymag.com/v1/imgs/c7e/71c/6959d67fe548e6bbab3a9f01bfdb783d1b-10-bong-joon-ho-oscars-2.jpg' WHERE id = '$ID_korisnika';";

	//$result = mysqli_query($conn, $query);
	//if($result){
	//	echo 'Data updated';
	//}else{
	//	echo 'Data not updated';
	//}
	//mysqli_close($conn);
	//header("Location: ../PROJEKT/profil.php?error=none");
	
}
else if($id == "bong-ho"){
	$slika = 'https://pyxis.nymag.com/v1/imgs/c7e/71c/6959d67fe548e6bbab3a9f01bfdb783d1b-10-bong-joon-ho-oscars-2.jpg';
}
else if($id == "bong-ho"){
	$slika = 'https://pyxis.nymag.com/v1/imgs/c7e/71c/6959d67fe548e6bbab3a9f01bfdb783d1b-10-bong-joon-ho-oscars-2.jpg';
}
else if($id == "godfather"){
	$slika = 'https://c-sf.smule.com/rs-s76/arr/dc/c5/c744c1b1-4646-4c4a-bb20-dbe985e3d62a.jpg';
}
else if($id == "jodie-foster"){
	$slika = 'https://c-sf.smule.com/rs-s38/arr/bb/f4/b2d040e4-c7cd-42fb-b8da-699f63e734b1.jpg';	
}
else if($id == "julie-andrews"){
	$slika = 'https://pbs.twimg.com/profile_images/650047932650102784/4mLFCCCB_400x400.jpg';
	
}
else if($id == "forrest-gump"){
	$slika = 'https://pbs.twimg.com/profile_images/378800000631886908/25627aeaadba05cd16a9a237af9c766c.jpeg';
	
}
else if($id == "titanic"){
	$slika = 'https://1.bp.blogspot.com/-cuezepIXQXw/XzbwxVRYVzI/AAAAAAAAAAU/kAKBYK637ZIMzUuKJS3VOoG4h324tXpmgCLcBGAsYHQ/w256-h256/cover-titanic-full-movie-in-bangla-version-16.jpeg';
	
}
else if($id == "russell-crowe"){
	$slika = 'https://pbs.twimg.com/profile_images/664790863759863808/4N_rm8YI_400x400.jpg';
	
}
else if($id == "casablanca"){
	$slika = 'https://avatarfiles.alphacoders.com/717/thumb-71741.jpg';
	
}else{
	header("Location: ../PROJEKT/profil.php?error=idnema");
}

	$query = "UPDATE korisnici SET
				  slikaKorisnika='" . $slika . "' WHERE id='" . $idKorisnika ."'";
	
	$result = mysqli_query($conn, $query);
	
	if($result){
		header("Location: ../PROJEKT/profil.php?error=none");
	} else {
		echo("UPDATE komanda nije uspjela. Kontaktirajte Web administratora!");
	}


}else{
	header("Location: ../PROJEKT/pocetna.php");
}