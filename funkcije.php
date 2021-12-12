<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
	$result;
	if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function emptyInputUid($username){
	$result;
	if(empty($username)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidUid($username){
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function invalidEmail($email){
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //built in php function
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function pwdMatch($pwd, $pwdRepeat){
	$result;
	if($pwd !== $pwdRepeat){ 
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function uidExists($conn, $username, $email){
	$sql = "SELECT * FROM korisnici WHERE uidKorisnika = ? OR emailKorisnika = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../signup.php?error=stmtfailed");
		exit();
	}	
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;   //ako korisnik postoji, vraćamo njegove podatke
	}
	else{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function newUidExists($conn, $username){
	$sql = "SELECT * FROM korisnici WHERE uidKorisnika = '$username';";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../promjenauid.php?error=stmtfailed");
		exit();
	}	
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;   //ako korisnik postoji, vraćamo njegove podatke
	}
	else{
		$result = false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
	$sql = "INSERT INTO korisnici (imeKorisnika, emailKorisnika, uidKorisnika, lozinka) VALUES (?, ?, ?, ?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../signup.php?error=stmtfailed");
		exit();
	}	
	
	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);  //koristimo default nacin hashiranja lozinke
	
	mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("Location: ../signup.php?error=none");
	exit();

}

function emptyInputLogin($username, $pwd){
	$result;
	if(empty($username) || empty($pwd)){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;
}

function loginUser($conn, $username, $pwd){
	$uidExists = uidExists($conn, $username, $username);
	
	if($uidExists === false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}
	
	$pwdHashed = $uidExists["lozinka"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	
	if($checkPwd === false){
		header("location: ../login.php?error=wronglogin");
		exit();
	}else if($checkPwd === true){
		session_start();
		$_SESSION["id"] = $uidExists["id"];
		$_SESSION["uidKorisnika"] = $uidExists["uidKorisnika"];
		header("location: ../index.php");
		exit();
	}
}

function deleteLoginConfirm($conn, $username, $pwd, $idKorisnika){
	$result;
	$uidExists = uidExists($conn, $username, $username);
	
	if($uidExists === false){
		$result = false;
		return $result;
	}
	
	if($uidExists['id'] === $idKorisnika){
		$pwdHashed = $uidExists["lozinka"];
		$checkPwd = password_verify($pwd, $pwdHashed);
	
		if($checkPwd === false){
			$result = false;
			return $result;
		}else if($checkPwd === true){
			$result = true;
			return $result;
	}
	}
	else{
		$result = false;
		return $result;
	}
}

function ratingKorisnika($ID, $idKorisnika){
	include("dbh.php");
	$sql = "SELECT * FROM korisnik_film WHERE filmId = '". $ID ."' AND korisnikId = '". $idKorisnika . "';";
	$result = mysqli_query($conn, $sql);
	if(!($result)){
		return 0;
	}
	
	$resultCheck = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);
	
	if (!isset($row['korisnikId'])){
		return 0;
	}
	
	if($row['rating'] == ""){
		return 0;
	}else{
		return $row['rating'];
	}
}

function provjeraPogledano($ID, $idKorisnika){
	include("dbh.php");
	$sql = "SELECT * FROM korisnik_film WHERE filmId = '". $ID ."' AND korisnikId = '". $idKorisnika . "';";
	$result = mysqli_query($conn, $sql);
	if(!($result)){
		return 0;
	}
	
	$row=mysqli_fetch_row($result);
	
	if (!isset($row[0])){
		return 0;
	}

	if($row[0] >= 1) {
		return 1;
	} else {
		return 0;
	}

}
