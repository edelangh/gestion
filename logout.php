<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	unset($_SESSION['id']);
	unset($_SESSION['id_user']);
	unset($_SESSION['login']);
	unset($_SESSION['admin']);
	
	header('location:login.php');
