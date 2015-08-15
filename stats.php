<?php require_once("header.php"); ?>
	<div class="container">
		<?php
		 define("VOID", 0.123456789);

		$_SESSION['SB']['villa'] = array(97, 120, 32, 12, VOID);
		$_SESSION['SB']['college'] = array(97, 120, 32, 12, VOID);
		$_SESSION['SB']['gym'] = array(97, 120, 32, 12, VOID);
		$_SESSION['SB']['lab'] = array("Coca","Leffe blonde", "Bounty", "Oasis Zero", "Mars");
		$_SESSION['SB']['x'] = count($_SESSION['SB']['lab']) * 100;
		$_SESSION['SB']['y'] = 300;

		?>
		<img src="stackedBar.php" style="width: auto; height:auto;" />
		<?php 

		?>
	</div>
<?php require_once("footer.php") ?>