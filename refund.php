<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$req = $bdd->prepare("SELECT list FROM ticket WHERE id = :id");
		$req->execute(array("id" => $_GET['id']));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$data = json_decode($data['list']);

		foreach ($data as $key => $value) {
			$value = (array) $value;
			var_dump($value);
			$query = "	UPDATE `produits` SET `nbr` = nbr + :qt WHERE id = :id";
			$req = $bdd->prepare($query);
			$req->execute(array(
				"qt" => $value['nbr'],
				"id" => $value['id']
				));
		}
		$req = $bdd->prepare("DELETE FROM ticket WHERE id = :id");
		$req->execute(array("id" => $_GET['id']));
	}
	header("location:index.php");

?>