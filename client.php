<script src="js/select.js"></script>
<body onload="init()">
<?php
// NOTE
// Charger une 1er fois la list des produits pour eviter de la charger a chaque fois !

$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'password');
session_start();
if (!isset($_SESSION['id']))
$_SESSION['id'] = 0;
if (!isset($_SESSION['list']))
$_SESSION['list'] = Array();
date_default_timezone_set('UTC');

if (isset($_GET['type']))
{
  if ($_GET['type'] == "cancel")
  {
    if (isset($_SESSION['list'][$_GET['id']]))
      if ($_SESSION['list'][$_GET['id']] > 0)
      {
        $_SESSION['list'][$_GET['id']] -= 1;
        if ($_SESSION['list'][$_GET['id']] == 0)
          unset($_SESSION['list'][$_GET['id']]);
      }
  }
  else if ($_GET['type'] == "buy")
  {
    $res = $bdd->query('SELECT * FROM produits WHERE id='.$_GET['id'])->fetch();
    if (!isset($_SESSION['list'][$_GET['id']]))
      $_SESSION['list'][$_GET['id']] = 0;
    if ($res['nbr'] > $_SESSION['list'][$_GET['id']])
      $_SESSION['list'][$_GET['id']] += 1;
  }
  else if ($_GET['type'] == "categorie")
  {
    $_SESSION['id'] = $_GET['id'];
  }
  else if ($_GET['type'] == "clear")
  {
    $_SESSION['list'] = Array();
  }
  else if ($_GET['type'] == "confirme")
  {
    header('Location: index.php?page=valide');

    /*
       $reponse = $bdd->query('INSERT INTO ticket(list, prix_total, date, id_user) VALUES (' \
       .serialize($_SESSION['list']) \
       .(42) \
       .date("Y-m-d H:i:s") \
       .$_SESSION['id_use'].')');
     */
    // Bon javoue que la requet est degueulasse !
    // et qu'il faudrait utiliser prepare
    // Mais bon il est 3H et il y en a qui bosse :D
  }
}




$cat = $_SESSION['id'];
?>

<div id="list">
<?php
foreach ($_SESSION['list'] as $id => $value)
{
  try {
    $reponse = $bdd->query('SELECT * FROM produits WHERE id='.$id);
    while ($res = $reponse->fetch())
    {
      echo "<div class='produit' id=".$res['id'].">";
      echo "<img src='".$res['img']."'></img>";
      echo $value;
      echo "</div>";

    }
  } catch (Exception $e) {
    echo "Et merde ...";
  }
}
?>
<div id="action">
<input id="buy" type="button" value ="buy !" />
<input id="clear" type="button" value="clear" />
</div>
</div>
<div id="buy_zone">
<div id="categories">
<?php
$reponse = $bdd->query('SELECT * FROM categorie');
while ($res = $reponse->fetch())
{
  echo "<div>";
  echo "<img class='categorie' id=".$res['id']." src='".$res['img']."'></img>";
  echo "</div>";
}

?>
</div>
<div id="produits">
tata
<?php

$reponse = $bdd->query('SELECT * FROM produits WHERE id_categorie='.$cat);
echo "<div>";
while ($res = $reponse->fetch())
{
  if ($res['nbr'] > 0 && $res['see'])
    if ($res['nbr'] < $res['nbr_limit'])
      echo "<div class='produit lowQuantity' id=".$res['id'].">";
    else
      echo "<div class='produit' id=".$res['id'].">";
  echo "<img src='".$res['img']."'></img>";
  echo "</div>";
}
echo "</div>";
?>
</div>
</body>
