<?php require_once("header.php"); ?>
<div class="container">
<?php
	$req = $bdd->prepare("SELECT c.id, c.name, p.prix FROM categorie AS c INNER JOIN prix AS p ON c.id = p.id_categorie WHERE c.id = :id");
	$req->execute(array("id" => $_GET['id']));
	$data = $req->fetch(PDO::FETCH_ASSOC);
?>
	<form action="modif_cat.php" method="POST">
		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="name" value="<?= $data['name'] ?>" autofocus>
		</div>

		<div class="form-group">
			<label for="img">Image</label>
			<input type="file" name="img">
		</div>

		<div class="form-group">
			<label for="prix">Prix unitaire d'achat</label>
			<div class="input-group">
				<input type="number" class="form-control" name="prix" step="0.01" min="0" value="<?= $data['prix'] ?>">
				<div class="input-group-addon">€</div>
			</div>
		</div>

		<input type="hidden" name="id" value="<?= $data['id'] ?>">

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php require_once("footer.php"); ?>