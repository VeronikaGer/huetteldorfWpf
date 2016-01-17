<?php
session_start();

$message = $_POST['message'];
//$message2 = $_POST['message2'];
$topic = $_POST['topic'];

$date = date("Y-m-d H:i:s");
$user = $_SESSION['benutzername'];

require_once('../config.inc.php');

try{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW); 	
	}catch(PDOException $e){
			echo "Verbindung fehlgeschlagen";
			die(); //hört auf mit allem, Abbruch
		}
		
		
//$corner = $db->query("SELECT 'corner' FROM hue_topic");
		
//if($corner){
	$stmt = $db->prepare('INSERT INTO hue_beitrag (topic,user,message,date) VALUES(:topic,:user,:message,:date)');

	$stmt->bindValue(':topic',$topic);
	$stmt->bindValue(':user',$user);
	$stmt->bindValue(':message',$message);
	$stmt->bindValue(':date',$date);

	$stmt->execute();
	//print_r($stmt->errorInfo());
	
	header('Location: ../lokale/corner.php?kommentar=0');	


?>