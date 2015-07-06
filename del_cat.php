<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
	{
		$req = $bdd->prepare("DELETE FROM categorie WHERE id = :id");
		$req->execute(array("id" => $_GET['id']));
		$req = $bdd->prepare("DELETE FROM prix WHERE id_categorie = :id");
		$req->execute(array("id" => $_GET['id']));
	}

	header("location:index.php");
?>