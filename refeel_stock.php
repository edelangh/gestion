<?php require_once("header.php"); ?>
<div class="container">
	<div class="outlined_txt" style="color: #1778A1">Selectionner le lieu, cliquer sur le produit et indiquer la quantité a transferer :</div>
	<form action="transfere_stock.php" method="POST">
	<select name="place" class="form-control">
		<option value="College">College</option>
		<option value="Gymnase">Gymnase</option>
	</select>
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