<?php require_once("header.php"); ?>
	<div class="container">
	<form action="day_result.php" method="GET">
	<?php
	if (!isset($_GET['day']) || !is_numeric($_GET['day'])) {
		$today = date('d');
		echo "<select name=\"day\">";
		for ($i=07; $i <= intval($today); $i++) {
			echo "<option value=". $i .">". $i ."/07/2015</option>";
		}
		?> 
		</select>
		<input type="submit" class="btn btn-primary">
	</form>
	<?php
	} else {
		$choosen = $_GET['day'] < 10 ? "0".$_GET['day'] : $_GET['day'];
		$pattern = "Y-m-". $choosen ." 08:00:00";
		$day = date($pattern);
		$end_day = date('Y-m-d H:i:s', strtotime($day . ' +1 day'));

		$req = $bdd->query("SELECT * FROM ticket WHERE date BETWEEN '". $day ."' AND '". $end_day ."'");
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
		$req->execute(array("date" => date("Y-m-". $choosen )));
		$data = $req->fetch(PDO::FETCH_ASSOC);
		$fond = $data['fond'];
		$gand_total = $fond + $total;

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
		<?php } ?>
	</div>
<?php require_once("footer.php"); ?>