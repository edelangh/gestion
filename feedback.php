<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	// var_dump($_SESSION); die();

	$req = $bdd->prepare("INSERT INTO `comment`(`comment`, `date`, `who`) VALUES ( :com, NOW(), :who)");
	$req->execute(array("com" => $_POST['comment'], "who" => $_SESSION['login']));

	header("location:index.php");
?>