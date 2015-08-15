<div class="container">
	<div class="outlined_txt" style="color: #FBDE18">Selectionner la catégorie a modifier :</div>
	<?php
		$req = $bdd->query("SELECT id, name, img FROM categorie");

		while ($data = $req->fetch(PDO::FETCH_ASSOC)) : ?>
		
		<div class="cat_mod cat" id="<?= $data['id'] ?>">
			<img src="<?= $data['img'] ?>">
			<p><?= $data['name'] ?></p>
		</div>

		<?php endwhile ?>
</div>