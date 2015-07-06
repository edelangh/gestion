<?php require_once("header.php"); ?>
<div class="container">
	<form action="add_categorie.php" method="POST">
		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="name" placeholder="Nom" autofocus>
		</div>

		<div class="form-group">
			<label for="img">Image</label>
			<input type="file" name="img">
		</div>

		<div class="form-group">
			<label for="prix">Prix unitaire d'achat</label>
			<div class="input-group">
				<input type="number" class="form-control" name="prix" step="0.01" min="0">
				<div class="input-group-addon">€</div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php require_once("footer.php"); ?>