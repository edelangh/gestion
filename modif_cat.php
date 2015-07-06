<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	// var_dump($_POST); die();


	$query = "UPDATE `categorie` SET `name` = :name WHERE id = :id";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"id" => $_POST['id']
		));

	if (!empty($_POST['img']))
	{
		$query = "	UPDATE `categorie` SET `img` = :img WHERE id = :id";
		$req = $bdd->prepare($query);
		$req->execute(array(
			"img" => "img/Cat/" . $_POST['img'],
			"id" => $_POST['id']
			));
	}

	$query = "UPDATE `prix` SET `prix` = :prix WHERE id_categorie = :id";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"prix" => $_POST['prix'],
		"id" => $_POST['id']
		));

	header("location:index.php");
?>