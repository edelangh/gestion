<?php require_once("header.php"); ?>
	<div class="container">

	<?php

	$start = "2015-07-08 08:00:00";
	$end = "2015-07-20 08:00:00";

	$bdd = new PDO('mysql:host=localhost;dbname=villa;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	$query = "SELECT `list`, `prix_total`, `date`, `id_user` FROM `ticket` WHERE date BETWEEN :start AND :end";
	$req = $bdd->prepare($query);
	$req->execute(array("start" => $start, "end" => $end));
	$villa = $req->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($villa as $key => $value) {
		$villa[$key]['list'] = json_decode($value['list'], TRUE);
		$villa[$key]['loc'] = "villa";
		foreach ($villa[$key]['list'] as $k => $v) {
			$query = "SELECT name FROM produits WHERE id = ?";
			$req = $bdd->prepare($query);
			$req->execute(array($v['id']));
			$tmp = $req->fetch(PDO::FETCH_ASSOC);
			$villa[$key]['list'][$k]['name'] = $tmp['name'];
			unset($villa[$key]['list'][$k]['id']);
		}
		$list[] = $villa[$key];
	}

	$bdd = new PDO('mysql:host=localhost;dbname=college;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT `list`, `prix_total`, `date`, `id_user` FROM `ticket` WHERE date BETWEEN :start AND :end";
	$req = $bdd->prepare($query);
	$req->execute(array("start" => $start, "end" => $end));
	$college = $req->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($college as $key => $value) {
		$college[$key]['list'] = json_decode($value['list'], TRUE);
		$college[$key]['loc'] = "college";

		foreach ($college[$key]['list'] as $k => $v) {
			$query = "SELECT name FROM produits WHERE id = ?";
			$req = $bdd->prepare($query);
			$req->execute(array($v['id']));
			$tmp = $req->fetch(PDO::FETCH_ASSOC);
			$college[$key]['list'][$k]['name'] = $tmp['name'];
			unset($college[$key]['list'][$k]['id']);
		}
		$list[] = $college[$key];
	}


	$bdd = new PDO('mysql:host=localhost;dbname=gym;charset=utf8', 'root', 'spoing', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$query = "SELECT `list`, `prix_total`, `date`, `id_user` FROM `ticket` WHERE date BETWEEN :start AND :end";
	$req = $bdd->prepare($query);
	$req->execute(array("start" => $start, "end" => $end));
	$gym = $req->fetchAll(PDO::FETCH_ASSOC);	

	foreach ($gym as $key => $value) {
		$gym[$key]['list'] = json_decode($value['list'], TRUE);
		$gym[$key]['loc'] = "gym";

		foreach ($gym[$key]['list'] as $k => $v) {
			$query = "SELECT name FROM produits WHERE id = ?";
			$req = $bdd->prepare($query);
			$req->execute(array($v['id']));
			$tmp = $req->fetch(PDO::FETCH_ASSOC);
			$gym[$key]['list'][$k]['name'] = $tmp['name'];
			unset($gym[$key]['list'][$k]['id']);
		}
		$list[] = $gym[$key];
	}

	foreach ($list as $key => $value) {
		foreach ($value['list'] as $v) {
			if (!empty($v['name']))
				$total[$value['loc']][$v['name']] = isset($total[$value['loc']][$v['name']]) ? $total[$value['loc']][$v['name']] + $v['nbr']: $v['nbr'];
		}
	}
	
	define("VOID", 0.123456789);

	foreach ($total['villa'] as $key => $value) {
		if (!isset($total['college'][$key]))
			$total['college'][$key] = 0;
		if (!isset($total['gym'][$key]))
			$total['gym'][$key] = 0;
		$labels[$key] = $key;
		$qt_villa[$key] = $value;
		$qt_college[$key] = $total['college'][$key] = 0 ? VOID : $total['college'][$key];
		$qt_gym[$key] = $total['gym'][$key] = 0 ? VOID : $total['gym'][$key];
	}

	ksort($labels);
	ksort($qt_villa);
	ksort($qt_college);
	ksort($qt_gym);

	foreach ($total as $key => $value) {
		ksort($total[$key]);
	}

	?>
<!-- 	<table>
		<thead>
			<tr>
				<td>Nom</td>
				<td>Quantité</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($total as $key => $value) : ?>
			<tr>
				<td><?= $key ?></td>
				<td><?= $value ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
 -->
<?php
	$max_qt = 0;
	foreach ($total['villa'] as $key => $value) {
		$total_qt = $value + $total['college'][$key] + $total['gym'][$key];
		$max_qt = $total_qt > $max_qt ? $total_qt : $max_qt;

	}
	$i = 0;
	$j = floor(count($labels) / 10);
	$k = count($labels) % 10;


	while ($i < $j) {
		$min = $i * 10;

		$_SESSION['SB'][$i]['villa'] = array_slice($qt_villa, $min, 10);
		$_SESSION['SB'][$i]['college'] = array_slice($qt_college, $min, 10);
		$_SESSION['SB'][$i]['gym'] = array_slice($qt_gym, $min, 10);
		$_SESSION['SB'][$i]['lab'] = array_slice($labels, $min, 10);

		$_SESSION['SB'][$i]['x'] = count($_SESSION['SB'][$i]['lab']) * 100;
		$_SESSION['SB'][$i]['y'] = 300;
		$_SESSION['SB'][$i]['max'] = $max_qt;

		$_SESSION['SB'][$i]['name'] = $i;

		echo '<img src="stackedBar.php?id='. $i .'" style="width: auto; height:auto;" />';
		$i++;
	}
	if ($k > 0) {
		$min = $i * 10;

		$_SESSION['SB'][$i]['villa'] = array_slice($qt_villa, $min, 10);
		$_SESSION['SB'][$i]['college'] = array_slice($qt_college, $min, 10);
		$_SESSION['SB'][$i]['gym'] = array_slice($qt_gym, $min, 10);
		$_SESSION['SB'][$i]['lab'] = array_slice($labels, $min, 10);

		$_SESSION['SB'][$i]['x'] = count($_SESSION['SB'][$i]['lab']) * 100;
		$_SESSION['SB'][$i]['y'] = 300;
		$_SESSION['SB'][$i]['max'] = $max_qt;

		$_SESSION['SB'][$i]['name'] = $i;

		echo '<img src="stackedBar.php?id='. $i .'" style="width: auto; height:auto;" />';
	}
?>

	</div>
<?php require_once("footer.php") ?>