<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	if ( (isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) )
	{
		$req = $bdd->prepare("SELECT * FROM user WHERE pseudo = :log");
		$req->execute(array("log" => $_POST['login']));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$pass = hash("whirlpool", $_POST['pass']);

		if ($data['pass'] == $pass)
		{
			$_SESSION['id'] = 1;
			$_SESSION['id_user'] = intval($data['id']);
			$_SESSION['login'] = $data['pseudo'];
			$_SESSION['admin'] = boolval($data['admin']);
		}
		else
			$_SESSION['log_error'] = 'error';
	}
	else
		$_SESSION['log_error'] = 'error';
	header('location:index.php');
