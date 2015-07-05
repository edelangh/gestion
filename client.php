
<div class="container">
	<?php require_once("client_dispatch.php"); ?>

	<div id="alert">
		
	</div>

	<div class="row" id="buy_zone">
		<div class="col-md-2" id="categories">
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

		<div class="col-md-8" id="produits">
			<div>
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

		<div class="col-md-2" id="panier">
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
			</div>		</div>
	</div>

</div>