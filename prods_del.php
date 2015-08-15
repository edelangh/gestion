<div class="container">
	<div class="outlined_txt" style="color: #E30613;">Selectionner le produit a supprimer :</div>
	<?php
		$req = $bdd->query("SELECT id, name, img FROM produits");

		while ($data = $req->fetch(PDO::FETCH_ASSOC)) : ?>
		
		<div class="prod_del prod" id="<?= $data['id'] ?>">
			<img src="<?= $data['img'] ?>">
			<p><?= $data['name'] ?></p>
		</div>

		<?php endwhile ?>
</div>