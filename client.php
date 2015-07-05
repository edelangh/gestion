<div class="container">
<?php
if (!isset($_SESSION['id']))
	$_SESSION['id'] = 0;
if (!isset($_SESSION['list']))
	$_SESSION['list'] = Array();
date_default_timezone_set('UTC');

if (isset($_GET['type']))
{
	if ($_GET['type'] == "cancel")
	{
		if (isset($_SESSION['list'][$_GET['id']]))
			if ($_SESSION['list'][$_GET['id']] > 0)
			{
				$_SESSION['list'][$_GET['id']] -= 1;
				if ($_SESSION['list'][$_GET['id']] == 0)
					unset($_SESSION['list'][$_GET['id']]);
			}
	}
	else if ($_GET['type'] == "buy")
	{
		if (isset($_GET['id']))
			$id = $_GET['id'];
		else
		{
			$req = $bdd->prepare('SELECT id FROM produits WHERE scancode = ?');
			$id = $req->execute(array($_GET['code']));
			$id = $req->fetch();
			$id = $id['id'];

		}
		if (!isset($_SESSION['list'][$id]))
			$_SESSION['list'][$id] = 0;
		$_SESSION['list'][$id] += 1;
		}
	else if ($_GET['type'] == "categorie")
	{
		$_SESSION['id'] = $_GET['id'];
	}
	else if ($_GET['type'] == "clear")
	{
		$_SESSION['list'] = Array();
	}
	else if ($_GET['type'] == "confirme")
	{
		header('Location: index.php?page=valide');
	}
}




$cat = $_SESSION['id'];
?>

<div id="list">
<?php
foreach ($_SESSION['list'] as $id => $value)
{
	try {
		$reponse = $bdd->prepare('SELECT * FROM produits WHERE id= ?');
		$reponse->execute(array($id));
		while ($res = $reponse->fetch())
		{
			echo "<div class='produit' id=".$res['id'].">";
			echo "<img src='".$res['img']."'></img>";
			echo $value;
			echo "</div>";
		}
	} catch (Exception $e) {
		echo "Et merde ... : " . $e->getMessage();
	}
}
?>
<div id="action">
<input id="buy" type="button" value ="buy !" />
<input id="clear" type="button" value="clear" />
</div>
</div>
<div id="buy_zone">
<div id="categories">
<?php
$reponse = $bdd->query('SELECT * FROM categorie');
while ($res = $reponse->fetch())
{
	$req = $bdd->query('SELECT SUM(nbr) FROM produits WHERE id_categorie =' . $res['id']);
	if ($req->fetch()[0] > 0) {
		echo "<div>";
		echo "<img class='categorie' id=".$res['id']." src='".$res['img']."'></img>";
		echo "</div>";
	}
}

?>
</div>
<div id="produits">

	<input type="text" id="code" autofocus/>

<?php

$reponse = $bdd->query('SELECT * FROM produits WHERE id_categorie='.$cat.' AND nbr > 0');
echo "<div>";
while ($res = $reponse->fetch())
{
	// if ($res['nbr'] > 0) {
		echo "<div class='produit' id=".$res['id'].">";
		echo "<img src='".$res['img']."'></img>";
		echo "</div>";
	// }
}
echo "</div>";
?>
</div>
</div>