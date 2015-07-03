<?PHP
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '');

	$req = $bdd->prepare("INSERT INTO ticket(list, prix_total, date, id_user) VALUES ( :list, :total, NOW(), :user)");
	$req->execute(array('list' => $_SESSION['cmd']['txt'],
						'total' => $_SESSION['cmd']['prix'],
						'user' => 0));	

$_SESSION['list'] = Array();
unset($_SESSION['cmd']);
echo "Commande enregistree<br />";
if ($_GET['give'] > 0) {
	echo "A rendre : ";
	echo $_GET['give'] - $_GET['total'];
	echo "&euro; <br />";
}
// header('Location: index.php?page=client');
?>
<a href="index.php"><button>OK</button></a>
