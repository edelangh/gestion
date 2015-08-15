<?php require_once("header.php");
	echo '<div class="container">';
	echo "<h1>Villa</h1>";
	$bdd = new PDO('mysql:host=localhost;dbname=villa;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT * FROM comment";
	$req = $bdd->query($query);
	while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
		echo $data['comment']."<br />";
	}


	echo "<h1>College</h1>";
	$bdd = new PDO('mysql:host=localhost;dbname=college;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT * FROM comment";
	$req = $bdd->query($query);
	while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
		echo $data['comment']."<br />";
	}


	echo "<h1>Gymnase</h1>";
	$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT * FROM comment";
	$req = $bdd->query($query);
	while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
		echo $data['comment']."<br />";
	}
?>

</div>