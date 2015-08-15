<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
// var_dump($_POST); die();
	$query = "INSERT INTO
			`produits`(`name`, `img`, `prix_achat`, `nbr`, `id_categorie`, `scancode`, `nbr_limit`, `id_prix`, `total_stock`)
			VALUES
			(:name, :img, :cout, :qt, :cat, :code, :qt_min, :prix, :qt)";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"name" => $_POST['name'],
		"img" => "img/Item/" . $_POST['img'],
		"cat" => intval($_POST['cat']),
		"cout" => floatval($_POST['cout']),
		"qt" => intval($_POST['qt']),
		"qt_min" => intval($_POST['qt_min']),
		"code" => $_POST['scancode'],
		"prix" => $_POST['prix']
		));
	if ($_POST['loc'] == "new") {
		header("location:products.php");
		return ;
	}
	header("location:index.php");
?>