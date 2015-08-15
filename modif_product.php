<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
	// var_dump($_POST); die();

	$query = "	UPDATE
					`produits`
				SET
					`name` = :name,
					`prix_achat` = :cout,
					`nbr` = :qt,
					`id_categorie` = :cat,
					`scancode` = :code,
					`nbr_limit` = :qt_min,
					`id_prix` = :prix,
					`total_stock` = :qt
				WHERE
					id = :id
				";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"cat" => intval($_POST['cat']),
		"cout" => floatval($_POST['cout']),
		"qt" => intval($_POST['qt']),
		"qt_min" => intval($_POST['qt_min']),
		"code" => $_POST['scancode'],
		"prix" => $_POST['prix'],
		"id" => $_POST['id']
		));

	if (!empty($_POST['img']))
	{
		$query = "	UPDATE `produits` SET `img` = :img WHERE id = :id";
		$req = $bdd->prepare($query);
		$req->execute(array(
			"img" => "img/Item/" . $_POST['img'],
			"id" => $_POST['id']
			));
	}

	header("location:index.php");

?>