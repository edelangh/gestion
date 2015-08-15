
<?php require_once("header.php"); ?>
<div class="container">
	<form id="add_stock" action="add_stock.php" method="POST">
	<?php
		$req = $bdd->query('SELECT * FROM produits');

		while ($data = $req->fetch(PDO::FETCH_ASSOC)) : ?>

		<div class="prod_box unchecked" style="background-image: url(<?= $data['img'] ?>)">
		    <input type="checkbox" name="<?= $data['id'] ?>" value="" style="display: none" />
			<input type="text" class="txt">
		</div>

	<?php endwhile ?>
		<div style="padding-left: 10px" ><button type="submit" class="btn btn-primary">Submit</button></div>
	</form>


</div>
<?php require_once("footer.php"); ?>