<?PHP
require_once("header.php");
echo "<div class=\"container\">";
$req = $bdd->prepare("INSERT INTO ticket(list, prix_total, date, id_user) VALUES ( :list, :total, NOW(), :user)");
$req->execute(array('list' => $_SESSION['cmd']['txt'],
					'total' => $_SESSION['cmd']['prix'],
					'user' => 0));

foreach ($_SESSION['list'] as $key => $value) {
	$req = $bdd->prepare('UPDATE produits SET nbr = nbr - :qt WHERE id = :id');
	$req->execute(array("qt" => $value, "id" => $key));
}

$req = $bdd->query('SELECT id FROM produits WHERE nbr <= nbr_limit');
while ($data = $req->fetch(PDO::FETCH_ASSOC))
{
	$_SESSION['need'][] = $data['id'];
}
$_SESSION['list'] = Array();
unset($_SESSION['cmd']);
echo "Commande enregistree<br />";
if ($_GET['give'] > 0) {
	echo "A rendre : ";
	echo $_GET['give'] - $_GET['total'];
	echo "&euro; <br />";
}
?>
	<a href="index.php"><button>OK</button></a>
</div>
<?php require_once("footer.php"); ?>