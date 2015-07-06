<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "INSERT INTO `categorie`(`name`, `img`) VALUES (:name, :img)";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"img" => "img/Cat/" . $_POST['img']
		));

	$data = $bdd->query("SELECT id FROM categorie ORDER BY id DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

	$query = "INSERT INTO `prix`(`prix`, `id_categorie`) VALUES (:prix, :cat)";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"prix" => $_POST['prix'],
		"cat" => $data['id']
		));

	header("location:index.php");
?>