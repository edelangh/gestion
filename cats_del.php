<div class="container">
	<div class="outlined_txt" style="color: #E30613;">Selectionner la catégorie a supprimer :</div>
	<?php
		$req = $bdd->query("SELECT id, name, img FROM categorie");

		while ($data = $req->fetch(PDO::FETCH_ASSOC)) : ?>
		
		<div class="cat_del cat" id="<?= $data['id'] ?>">
			<img src="<?= $data['img'] ?>">
			<p><?= $data['name'] ?></p>
		</div>

		<?php endwhile ?>
</div>