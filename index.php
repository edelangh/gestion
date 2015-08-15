<?php
include_once("header.php");
if (!isset($_GET['page']) || $_GET['page'] == "client")
{
	include_once("client.php");
}
else if ($_GET['page'] == "valide")
	include_once("valide.php");
else if ($_GET['page'] == "valideEnd")
	include_once("valideEnd.php");
include_once("footer.php");

