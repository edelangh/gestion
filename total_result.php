<?php require_once("header.php"); ?>
	<div class="container">
		<?php

		$req = $bdd->query("SELECT * FROM ticket WHERE date BETWEEN '2015-07-08 08:00:00' AND '2015-07-20 08:00:00'");
		$total = 0;
		$sell = array();
		while ($data = $req->fetch(PDO::FETCH_ASSOC))
		{
			$total += $data['prix_total'];
			$ticket = json_decode($data['list']);
			foreach ($ticket as $key => $value) {
				$value = (array) $value;
				if (isset($sell[$value['id']]))
					$sell[$value['id']] += $value['nbr'];
				else
					$sell[$value['id']] = $value['nbr'];
			}
		}
		$req = $bdd->prepare("SELECT fond FROM caisse WHERE date = :date");
		$req->execute(array("date" => "2015-07-08"));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$fond = $data['fond'];
		$gand_total =  $fond + $total;
		
		arsort($sell);

		?>
		<div class="container">
		<table class="table table-bordered table-striped" style="text-align: center">
			<tr>
				<th>Produit</th>
				<th>Quantité vendue</th>
				<th>Stock restant</th>
				<th>Bénéfice</th>
			</tr>
		<?php
		$gand_benef = 0;
		foreach ($sell as $key => $value) {
			$req = $bdd->prepare("SELECT p.*, pr.prix FROM produits AS p INNER JOIN prix AS pr ON pr.id = p.id_prix WHERE p.id = :id");
			$req->execute(array("id" => $key));
			$data = $req->fetch(PDO::FETCH_ASSOC);
			$sell_nbr = $sell[$data['id']];
			$benef = $sell_nbr * ($data['prix'] - $data['prix_achat']);
			$gand_benef += $benef;
			?>
			<tr>
				<td><?= $data['name'] ?></td>
				<td><?= $sell_nbr ?></td>
				<td><?= $data['nbr'] ?></td>
				<td><?= $benef ?></td>
			</tr>
			<?php
		}
		?>
		</table>
		<table class="table" style="width: 700px">
			<tr>
				<td><strong>Total Entrée</strong></td>
				<td style="text-align: right"><?=  number_format($total, 2, ",", " ") ?></td>
				<td><strong>Total Bénéfice</strong></td>
				<td><?= $gand_benef ?></td>
			</tr>

			<tr>
				<td><strong>Caisse</strong></td>
				<td style="text-align: right"><?=  number_format($fond, 2, ",", " ") ?></td>
			</tr>
			<tr>
				<td><strong>Total Caisse</strong></td>
				<td style="text-align: right"><?= number_format($gand_total, 2, ",", " ") ?></td>
			</tr>
		</table>
		</div>
	</div>
<?php require_once("footer.php"); ?>