<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$query = "INSERT INTO
			`produits`(`name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`)
			VALUES
			(:name, :img, :cout, :qt, :cat, :code, :qt_min, :prix)";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"img" => "img/Item/" . $_POST['img'],
		"cat" => intval($_POST['cat']),
		"cout" => floatval($_POST['cout']),
		"qt" => intval($_POST['qt']),
		"qt_min" => intval($_POST['qt_min']),
		"code" => $_POST['scancode'],
		"prix" => $_POST['cat']
		));
	header("location:index.php");
?>