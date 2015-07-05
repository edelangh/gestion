<div class="container">
	<?php require_once("client_dispatch.php"); ?>

		

	<div class="row" id="buy_zone">
		<div class="col-md-10 col-md-offset-2 alert">
			<div  id="alert">
				<?php
					foreach ($_SESSION['need'] as $value) {
						$req = $bdd->query('SELECT img, nbr, nbr_limit FROM produits WHERE id =' . $value)->fetch(PDO::FETCH_ASSOC);
						; ?>
						<div class="need">
						<div class="place">College</div>
						<img src="<?= $req['img']; ?>"></img>
						<div class="qt">X<?php echo $req['nbr_limit'] - $req['nbr']; ?></div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
		<div class="col-md-2">
			<div id="categories">
				<?php
					$reponse = $bdd->query('SELECT * FROM categorie');
					while ($res = $reponse->fetch())
					{
						$req = $bdd->query('SELECT SUM(nbr) FROM produits WHERE id_categorie =' . $res['id']);
						if ($req->fetch()[0] > 0) {
							echo "<div>";
							echo "<img class='categorie' id=".$res['id']." src='".$res['img']."'></img>";
							echo "</div>";
						}
					}
				?>
				<input type="text" id="code" autofocus/>
			</div>
		</div>

		<div class="col-md-8">
			<div id="produits">
			<?php
			$reponse = $bdd->query('SELECT * FROM produits WHERE id_categorie='. $_SESSION['id'] .' AND nbr > 0');
			while ($res = $reponse->fetch())
			{
					echo "<div class='produit' id=".$res['id'].">";
					echo "<img src='".$res['img']."'></img>";
					echo "</div>";
			}
			?>
			</div>
		</div>

		<div class="col-md-2 panier">
			<div id="panier">
				<?php
				foreach ($_SESSION['list'] as $id => $value)
				{
					$reponse = $bdd->prepare('SELECT * FROM produits WHERE id= ?');
					$reponse->execute(array($id));
					while ($res = $reponse->fetch())
					{
						echo "<div class='produit' id=".$res['id'].">";
						echo "<img src='".$res['img']."'></img>";
						echo $value;
						echo "</div>";
					}
				}
				?>
				<div id="action">
					<input id="buy" type="button" value ="buy !" />
					<input id="clear" type="button" value="clear" />
				</div>
			</div>
		</div>
	</div>

</div>