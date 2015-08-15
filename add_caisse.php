<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "INSERT INTO `caisse`(`fond`, `date`) VALUES (:fond, NOW())";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"fond" => $_POST['caisse']
		));

	header("location:index.php");
?>