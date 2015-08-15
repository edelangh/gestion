<?php require_once("header.php"); ?>
	<div class="container">

	<?php

	$bdd = new PDO('mysql:host=localhost;dbname=villa;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT id, name FROM produits";
	$req = $bdd->query($query);
	$villa = $req->fetchAll(PDO::FETCH_ASSOC);	

	$bdd = new PDO('mysql:host=localhost;dbname=college;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT id, name FROM produits";
	$req = $bdd->query($query);
	$college = $req->fetchAll(PDO::FETCH_ASSOC);

	$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT id, name FROM produits";
	$req = $bdd->query($query);
	$gym = $req->fetchAll(PDO::FETCH_ASSOC);

	?>

	<table>
		<thead>
			<tr>
				<td>id</td>
				<td>Villa</td>
				<td>College</td>
				<td>Gymnase</td>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i < 26; $i++) : ?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $villa[$i]['name'] ?></td>
					<td><?php
						if (isset($college[$i]['name']))
								echo $college[$i]['name'];
							else
								echo "N/A";
						?>
					</td>
					<td><?php
						if (isset($gym[$i]['name']))
								echo $gym[$i]['name'];
							else
								echo "N/A";
						?>
					</td>
				</tr>
			<?php endfor ?>
		</tbody>
	</table>

	</div>
<?php require_once("footer.php") ?>