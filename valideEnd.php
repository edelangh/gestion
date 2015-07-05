<?PHP
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', 'password');


$cmd = Array();
$prix_total = 0;
$stmt = $bdd->prepare("UPDATE produits SET nbr = :nbr WHERE id = :id");
foreach ($_SESSION['list'] as $key => $nbr)
{
  $res = $bdd->query('SELECT * FROM produits WHERE id='.$key)->fetch();
  $nbrStock = $res['nbr'];
  $res = $bdd->query('SELECT * FROM prix WHERE id='.$res['id_prix'])->fetch();
  // Use JOIN to improve this request
  $cmd[] = array("id" => $key, "nbr" => $nbr, "prix_unit" => $res['prix']);
  $prix_total += $res['prix'] * $nbr;
  $bNbr = ($nbrStock - $nbr);
  $stmt->bindParam(':id', $key);
  $stmt->bindParam(':nbr', $bNbr);
  $stmt->execute();
}


// DEBUG !!!!
// DEBUG !!!!
$_SESSION['id_user'] = 42;
// DEBUG !!!!
// DEBUG !!!!

$id_user = $_SESSION['id_user'];
$date = date("Y-m-d H:i:s");

  $stmt = $bdd->prepare("INSERT INTO ticket
      (`list`, `prix_total`, `date`, id_user)
      VALUES (:list, :prix_total, :date, :id_user)");

  $stmt->bindParam(':list', json_encode($cmd));
  $stmt->bindParam(':prix_total', $prix_total);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':id_user', $id_user);

  $stmt->execute();

  echo json_encode($cmd);
  $_SESSION['list'] = Array();

    header('Location: index.php?page=client');
  ?>
