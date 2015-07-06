<?php require_once("header.php"); ?>
<div class="container">
	<form id="add_stock" action="add_stock.php" method="POST">
		
		<div class="form-group">
			<?php
				$req = $bdd->query("SELECT name, id, nbr FROM produits");
				$data = $req->fetchAll(PDO::FETCH_ASSOC);
				foreach ($data as $value) {
			?>
			<label for="name"><?= $value['name'] ?></label>
			<input type="number" class="form-control" name="<?= $value['id'] ?>" value="0">
			<?php } ?>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php require_once("footer.php"); ?>