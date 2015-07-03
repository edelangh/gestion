<?PHP
$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'password');
session_start();



		$cmd = Array();
		$prix_total = 0;
		foreach ($_SESSION['list'] as $key => $nbr)
		{
			$res = $bdd->query('SELECT * FROM produits WHERE id='.$key)->fetch();
			$res = $bdd->query('SELECT * FROM prix WHERE id='.$res['id_prix'])->fetch();
			// Use JOIN to improve this request
			$cmd[] = array("id" => $key, "nbr" => $nbr, "prix_unit" => $res['prix']);
			$prix_total += $res['prix'] * $nbr;
		}
		echo "Prix Total:".$prix_total." E";
		echo json_encode($cmd);
?>
	A Payer : <?PHP echo $prix_total; ?>
	Payer   : <input type="value" value="0"/>
</br>
<a href="index.php?page=client">Return</a>
<a href="index.php?page=valideEnd">Accept</a>
