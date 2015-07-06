<?php
	require_once("header.php");

	$cmd = Array();
	$prix_total = 0;
	foreach ($_SESSION['list'] as $key => $nbr)
	{
		$query = "SELECT * FROM prix INNER JOIN produits AS prod ON prix.id = prod.id_prix WHERE prod.id = :key";
		$req = $bdd->prepare($query);
		$req->execute(array("key" => $key));
		$res = $req->fetch(PDO::FETCH_ASSOC);
		$cmd[] = array("id" => $key, "nbr" => $nbr, "prix_unit" => $res['prix']);
		$prix_total += $res['prix'] * $nbr;
	}

	$req = $bdd->prepare("INSERT INTO ticket(list, prix_total, date, id_user) VALUES ( :list, :total, NOW(), :user)");
	$req->execute(array('list' => json_encode($cmd),
						'total' =>  $prix_total,
						'user' => $_SESSION['id_user']));

	foreach ($_SESSION['list'] as $key => $value) {
		$req = $bdd->prepare('UPDATE produits SET nbr = nbr - :qt WHERE id = :id');
		$req->execute(array("qt" => $value, "id" => $key));
	}

	$req = $bdd->query('SELECT id FROM produits WHERE nbr < nbr_limit');
	while ($data = $req->fetch(PDO::FETCH_ASSOC))
	{
		if (!isset($_SESSION['need']) || !in_array($data['id'], $_SESSION['need']))
			$_SESSION['need'][] = $data['id'];
	}
	$_SESSION['list'] = Array();
	unset($_SESSION['cmd']);

	header("location:index.php");
?>