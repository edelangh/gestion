<?php
require_once("header.php"); 

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>

<div class="container">
	<form id="modif_product" action="modif_product.php" method="POST">
		
		<?php

			$req = $bdd->prepare("SELECT * FROM produits WHERE id = :id");
			$req->execute(array("id" => $_GET['id']));
			$data = $req->fetch(PDO::FETCH_ASSOC);
		?>

	<form id="add_product" action="add_product.php" method="POST">
		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="name" value="<?= $data['name'] ?>" autofocus>
		</div>

		<div class="form-group">
			<label for="img">Image</label>
			<input type="file" name="img">
		</div>

		<div class="form-group">
			<label for="cat">Catégorie
				
			</label>

			<select name="cat" class="form-control">
			<?php
				$req2 = $bdd->query('SELECT id, name FROM categorie');
				while ($data2 = $req2->fetch(PDO::FETCH_ASSOC)) :
			?>
				<option value="<?= $data2['id'] ?>" <?php if ($data['id_categorie'] == $data2['id']) echo "selected" ?>><?= $data2['name'] ?></option>
			<?php endwhile ?>
			</select>
		</div>

		<div class="form-group">
			<label for="prix">Prix</label>

			<select name="prix" class="form-control">
			<?php
				$req2 = $bdd->query('SELECT id, prix FROM prix');
				while ($data2 = $req2->fetch(PDO::FETCH_ASSOC)) :
			?>
				<option value="<?= $data2['id'] ?>" <?php if ($data['id_prix'] == $data2['id']) echo "selected" ?>><?= $data2['prix'] ?>€</option>
			<?php endwhile ?>
			</select>
		</div>

		<div class="form-group">
			<label for="cout">Prix unitaire d'achat</label>
			<div class="input-group">
				<input type="number" class="form-control" name="cout" step="0.01" min="0" value="<?= floatval($data['prix_achat']) ?>">
				<div class="input-group-addon">€</div>
			</div>
		</div>

		<div class="form-group">
			<label for="qt">Quantité</label>
			<input type="number" class="form-control" name="qt" min="0" value="<?= intval($data['nbr']) ?>">
		</div>

		<div class="form-group">
			<label for="qt_min">Stock minimal avant reaprovisionnement</label>
			<input type="number" class="form-control" name="qt_min" min="0" value="<?= intval($data['nbr_limit']) ?>">
		</div>

		<div class="form-group">
			<label for="scancode">Scancode</label>
			<input type="text" class="form-control" name="scancode" id="scancode" value="<?= $data['scancode'] ?>">
		</div>

		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">

		<button type="submit" class="btn btn-primary">Submit</button>	</form>
</div>
<?php endif ?>
<?php require_once("footer.php"); ?>

