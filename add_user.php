<?php
	try {
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'password');

	$bdd->query("INSERT INTO user(pseudo, pass) VALUES ('". $_GET['user']."', '". hash("whirlpool", $_GET['pass'])."')");
	} catch (Exception $e) { 
		echo $e->getMessage();
	}
?>
