<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "INSERT INTO `categorie`(`name`, `img`) VALUES (:name, :img)";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"img" => "img/Cat/" . $_POST['img']
		));

	header("location:index.php");
?>