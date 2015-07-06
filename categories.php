<?php require_once("header.php"); 

if ((isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
	&& ((isset($_GET['type']) && ($_GET['type'] == "modif" || $_GET['type'] == "del" ) )))
{
	if ($_GET['type'] == "del")
		require_once("cats_del.php");
	else
		require_once("cats_mod.php");

}
else
	require_once("cat_add.php");

require_once("footer.php"); ?>