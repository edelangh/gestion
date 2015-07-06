<div class="container">
	<div class="outlined_txt" style="color: #FBDE18">Selectionner le produit a modifier :</div>
	<?php
		$req = $bdd->query("SELECT id, name, img FROM produits");

		while ($data = $req->fetch(PDO::FETCH_ASSOC)) : ?>
		
		<div class="prod_mod prod" id="<?= $data['id'] ?>">
			<img src="<?= $data['img'] ?>">
			<p><?= $data['name'] ?></p>
		</div>

		<?php endwhile ?>
</div>