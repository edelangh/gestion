<?php require_once("header.php"); ?>
<div class="container">
	<form action="add_caisse.php" method="POST">
		<div class="form-group">
			<label for="name">Fond de caisse du <?= date('d/m/Y', time()); ?></label>
			<input type="number" class="form-control" name="caisse"  step="0.01" min="0" autofocus>
		</div>

		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php require_once("footer.php"); ?>