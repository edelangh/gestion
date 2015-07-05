<?php
include_once("header.php");
if (!isset($_GET['page']) || $_GET['page'] == "client")
	include_once("client.php");
else
	include_once($_GET['page'].".php");
include_once("footer.php");

