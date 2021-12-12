<?php

if(isset($_POST["submit"])){
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	
	//require_once 'pocetna.php';
	require_once 'dbh.php';
	require_once 'funkcije.php';
	
	if(emptyInputLogin($username, $pwd) !== false){
		header("Location: ../PROJEKT/login.php?error=emptyinput");
		exit();
	}
	
	loginUser($conn, $username, $pwd);
}else{
	header("Location: ../PROJEKT/login.php");
	exit();
}