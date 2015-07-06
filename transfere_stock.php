<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$place =  $_POST['place'];
	unset($_POST['place']);

	$req = $bdd->prepare("INSERT INTO
		`refeel`(`stock`, `place`, `date`)
	VALUES
		(:stock, :place, NOW())");
	$req->execute(array("stock" => json_encode($_POST), "place" => $place));

	foreach ($_POST as $key => $value) {
	$query = "	UPDATE
					`produits`
				SET
					`nbr` = nbr - :qt
				WHERE
					id = :id
				";
	$req = $bdd->prepare($query);
	$req->execute(array(
		"qt" => $value,
		"id" => $key
		));
	}

	header("location:index.php");
?>