<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	foreach ($_POST as $key => $value) {
		$query = "UPDATE produits SET nbr = nbr + :qt, total_stock = total_stock + :total WHERE id = :id";
		$req = $bdd->prepare($query);
		$req->execute(array(
			"qt" => intval($value),
			"total" => intval($value),
			"id" => $key
			));
	}

	header("location:index.php");
?>