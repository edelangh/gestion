<div class="container">
	<?php

	require_once("client_dispatch.php");

	$req = $bdd->query('SELECT id FROM produits WHERE nbr < nbr_limit');
	while ($data = $req->fetch(PDO::FETCH_ASSOC))
	{
		if (!isset($_SESSION['need']) || !in_array($data['id'], $_SESSION['need']))
			$_SESSION['need'][] = $data['id'];
	}
	
	?>
	<div class="row" id="buy_zone">
		<div class="col-md-10 col-md-offset-2 need_bar">
			<div  id="need_bar">
				<?php
					if (isset($_SESSION['need'])) {
						foreach ($_SESSION['need'] as $key => $value)
						{
							$req = $bdd->query('SELECT img, nbr, nbr_limit FROM produits WHERE id =' . $value)->fetch(PDO::FETCH_ASSOC);
							
							if ($req['nbr_limit'] > $req['nbr'])
							{
								?>
								<div class="need outlined_txt">
								<div class="place">College</div>
								<img src="<?= $req['img']; ?>"></img>
								<div class="qt">X<?php echo $req['nbr_limit'] - $req['nbr']; ?></div>
								</div>
								<?php
							}
							else
								unset($_SESSION['need'][$key]);
						}
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
						echo "<div>";
						echo "<img class='categorie";
						if ($req->fetch()[0] < 1)
							echo " categorie_empty";
						if ($res['id'] == $_SESSION['id'])
							echo " categorie_active";
						echo "' id=".$res['id']." src='".$res['img']."'></img>";
						echo "</div>";
					}
				?>
				<div class="code">
					<label for="code">SCAN</label>
					<input type="text" id="code" name="code" autofocus/>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div id="produits">
			<div class="outlined_txt" id="product_title">Selectionner le produit :</div>
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
				<div class="items">
					<?php
					foreach ($_SESSION['list'] as $id => $value)
					{
						$reponse = $bdd->prepare('SELECT * FROM produits WHERE id= ?');
						$reponse->execute(array($id));
						while ($res = $reponse->fetch())
						{
						?>
							<div class='product' id="<?= $res['id']; ?>">
							<img src="<?= $res['img']; ?>"></img>
							<div class="qt_basket outlined_txt">X<?= $value ?></div>
							</div>

						<?php
						}
					}
					?>
				</div>
				<div id="total">
					<div class="outlined_txt">
						Total
					</div>
					<div id="total_price">
						<?php
							$prix_total = 0.00;
							if (isset($_SESSION['list'])) {
								foreach ($_SESSION['list'] as $key => $nbr)
								{
									$query = "SELECT * FROM prix INNER JOIN produits AS prod ON prix.id = prod.id_prix WHERE prod.id = :key";
									$req = $bdd->prepare($query);
									$req->execute(array("key" => $key));
									$res = $req->fetch(PDO::FETCH_ASSOC);
									$prix_total += $res['prix'] * $nbr;
								}
							}
							echo $prix_total;
						?>
						 €
					</div>
				</div>
				<div id="action">
					<input id="clear" type="button" value="Vider" />
					<input id="buy" type="button" value ="OK" />
				</div>
			</div>
		</div>
	</div>

</div>