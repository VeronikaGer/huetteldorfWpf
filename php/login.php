<?php 
session_start();

	require_once('../config.inc.php');

	$benutzername = $_POST['benutzername'];
	$passwort = $_POST['passwort'];
	
	//Neues PDO Objekt, Verbindung zu DB kann aufgebaut werden
	try{
	$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW); 	}catch(PDOException $e){
			echo "Verbindung fehgeschlagen!";
			die(); //hört auf mit allem, Abbruch
		}

	$users = $db->query("SELECT * FROM hue_users");
	$users = $users->fetchAll(); //Wird in assoziatives Array geschrieben
	
	foreach($users as $u){
		if($u['benutzername'] == $benutzername && $u['passwort'] == $passwort){
			$_SESSION['benutzername'] = $benutzername;
			$_SESSION['login'] = true;
			header('Location: ../index.php'); 
			break;	
		}else{
			header('Location: login.php');
		}	
	}
	
?>