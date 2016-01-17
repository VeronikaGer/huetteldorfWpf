<?php 
	$benutzername = $_POST['benutzername'];
	$passwort = $_POST['passwort'];
	$eingabe = true;
	
	if(isset($benutzername) && $benutzername != " " && isset($passwort) && $passwort != " "){
		
	require_once('config.inc.php');
	
	//Neues PDO Objekt, Verbindung zu DB kann aufgebaut werden
	try{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW); 	
	}catch(PDOException $e){
			echo "Verbindung fehlgeschlagen";
			die(); //hört auf mit allem, Abbruch
		}
		
	$users = $db->query("SELECT * FROM hue_users");
	$users = $users->fetchAll();
	
	foreach($users as $u){
		if($u['benutzername'] == $benutzername){
			$eingabe = false;
			}
		}
		
		if($eingabe){
	
	//user werden der DB hinzugefügt
	$stmt = $db->prepare("INSERT INTO hue_users (benutzername,passwort) VALUES (:benutzername,:passwort)");	
	
	$stmt->bindValue(':benutzername',$benutzername);
	$stmt->bindValue(':passwort',$passwort);
	
	$stmt->execute();
	
		}
	}
	
	header("Location: index.html");
	
?>