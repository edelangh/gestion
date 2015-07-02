<?php

	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'password');
$reponse = $bdd->query('SELECT * FROM produits');
echo "<div>";
while ($res = $reponse->fetch())
{
	echo "<div>";
	echo "<img class='produit' id=".$res['id']." src='".$res['img']."'></img>";
	echo "</div>";
}
echo "</div>";
?>
