<?php require_once("header.php"); ?>
	<div class="container">
		<form action="refund.php" method="POST">
			<div class="form-group">
				<?php
					$pattern = "Y-m-d 08:00:00";
					$day = date($pattern);
					$end_day = date('Y-m-d H:i:s', strtotime($day . ' +1 day'));
					$req = $bdd->query("SELECT * FROM ticket WHERE date BETWEEN '".$day."' AND '$end_day'");
					while ($data = $req->fetch(PDO::FETCH_ASSOC))
					{
						echo "<div class=\"ticket\" id=\"".$data['id']."\"><div ><a href=\"refund.php?id=".$data['id']."\" role=\"button\" class=\"ticket_delete\">X</a></div>";
						echo "<div class=\"place\">Le ".date('d/m/Y à H:i:s', strtotime($data['date']))."</div>";
						$list = json_decode($data['list']);
						foreach ($list as $key => $value) {
							$value = (array) $value;
// var_dump($data); die();
							$item = $bdd->query("SELECT * FROM produits WHERE id = ".$value['id'])->fetch(PDO::FETCH_ASSOC);
// var_dump($item); die();
							date_default_timezone_set('Europe/Paris');
						
						?>
						<div class="need outlined_txt" style="background-color: #1778A1;">
						<img src="<?= $item['img']; ?>"></img>
						<div class="qt">X<?= $value['nbr'] ?></div>
						</div>
						<?php
						}
						echo "</div>";

					}

				?>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
<?php require_once("footer.php"); ?>