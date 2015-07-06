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
?>
