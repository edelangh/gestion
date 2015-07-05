<body onload="init()">
<script src="js/valide.js"></script>
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
		echo json_encode($cmd);

?>
<script type='text/javascript'>var prixTotal=<?PHP echo $prix_total;?>;</script>
<!-- Je pense que c'est le trucs le moins secu du monde -->
</br>
	A Payer : <?PHP echo $prix_total; ?>
</br>
	Payer   : <input type="number" id="payer" value="0"/>
</br>
<a href="index.php?page=client">Return</a>
<input type="button" id="accept" value="Accept" />
</body>
