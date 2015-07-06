<div class="container">
	<form id="add_product" action="add_product.php" method="POST">
		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="name" placeholder="Nom" autofocus>
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
				$req = $bdd->query('SELECT cat.id, cat.name, p.prix FROM categorie AS cat INNER JOIN prix AS p ON cat.id = p.id_categorie ');
				while ($data = $req->fetch(PDO::FETCH_ASSOC)) :
			?>
				<option value="<?= $data['id'] ?>"><?= $data['name']. " ( " . $data['prix'] . " € )" ?></option>
			<?php endwhile ?>
			</select>
		</div>

		<div class="form-group">
			<label for="cout">Prix unitaire d'achat</label>
			<div class="input-group">
				<input type="number" class="form-control" name="cout" step="0.01" min="0">
				<div class="input-group-addon">€</div>
			</div>
		</div>

		<div class="form-group">
			<label for="qt">Quantité</label>
			<input type="number" class="form-control" name="qt" min="0">
		</div>

		<div class="form-group">
			<label for="qt_min">Stock minimal avant reaprovisionnement</label>
			<input type="number" class="form-control" name="qt_min" min="0">
		</div>

		<div class="form-group">
			<label for="scancode">Scancode</label>
			<input type="text" class="form-control" name="scancode" id="scancode">
		</div>

		<button type="submit" name="loc" class="btn btn-primary">Submit</button>
		<button type="submit" name="loc" value="new" class="btn btn-primary">Submit and add new</button>
	</form>
</div>