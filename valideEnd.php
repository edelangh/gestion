<?PHP
session_start();
$_SESSION['list'] = Array();
header('Location: index.php?page=client');
?>
