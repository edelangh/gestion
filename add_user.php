<?php
	try {
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '');

	$bdd->query("INSERT INTO user(pseudo, pass) VALUES ('". $_POST['user']."', '". hash("whirlpool", $_POST['pass'])."')");
	} catch (Exception $e) { 
		echo $e->getMessage();
	}
	header("location:index.php");
?>
