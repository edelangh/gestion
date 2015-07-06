<?php
	session_start();
?>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Bar Parallele 3000</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="accueil">
				<form action="log.php" method="POST">
					<input type="text"  class="log_name" name="login" autofocus/>
					<input type="password"  class="log_pass" name="pass" />
					<input type="submit" class="log_button" value="OK" />
				</form>
				<?php
					if (isset($_SESSION['log_error']))
					{
						echo '<div class="log_error">Try again ...</div>';
						unset($_SESSION['log_error']);
					}
				?>
			</div>
		</div>
<?php require_once("footer.php"); ?>
