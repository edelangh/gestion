<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Bar Parallele 3000</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<?php

	if (isset($_SESSION['login']) && !empty($_SESSION['login']))
	{
		require_once("nav_bar.php");
	}
	else
	{
		if ($_SERVER['PHP_SELF'] != "/gestion/login.php")
			header("location:login.php");
	}
