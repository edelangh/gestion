<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
	{
		$req = $bdd->prepare("DELETE FROM produits WHERE id = :id");
		$req->execute(array("id" => $_GET['id']));
	}

	if (in_array( $_GET['id'], $_SESSION['need']))
		unset($_SESSION['need'][$_GET['id']]);

	header("location:index.php");
?>