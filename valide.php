<?PHP
$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
session_start();

		$cmd = Array();
		$prix_total = 0;
		foreach ($_SESSION['list'] as $key => $nbr)
		{
			$query = "SELECT * FROM prix INNER JOIN produits AS prod ON prix.id = prod.id_prix WHERE prod.id = ". $key;
			$res = $bdd->query($query)->fetch();
			$cmd[] = array("id" => $key, "nbr" => $nbr, "prix_unit" => $res['prix']);
			$prix_total += $res['prix'] * $nbr;
		}
		$_SESSION['cmd']['txt'] = json_encode($cmd);
		$_SESSION['cmd']['prix'] = $prix_total;
?>
	A Payer : <?PHP echo $prix_total; ?> &euro; <br />
	Payer   :
	<form action="valideEnd.php" method="GET">
		<input type="value"  name="give" value="0"/>
		<input type="hidden" name="total" value="<?= $prix_total ?>" />
		<button type="submit">Valider</button>
	</form>
		<a href="index.php?page=client" role="button">Retour</a>