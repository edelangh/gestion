<?php
   switch ($_SERVER['PHP_SELF']) {
    case '/gestion/products.php':
      $active = 1;
      break;

      case '/gestion/categories.php':
      $active = 2;
      break;
    
    default:
      $active = 0;
      break;
   }
?>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<?= $_SESSION['login']; ?>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown<?php if ($active == 0) echo " active"; ?>">
					<a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Caisse <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="index.php">Caisse</a></li>
						<li><a href="#">Erreur de caisse / Remboursement</a></li>
					</ul>
				</li>
				<li>
					<a href="refeel_stock.php">Tranferer des stocks</a>
				</li>
				<li class="dropdown<?php if ($active == 1) echo " active"; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="stock.php">Ajouter des stocks</a></li>
						<li><a href="products.php">Ajouter</a></li>
						<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
							<li><a href="products.php?type=modif">Modifier</a></li>
							<li><a href="products.php?type=del">Supprimer</a></li>
						<?php endif ?>
					</ul>
				</li>
				<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) : ?>
					<li class="dropdown<?php if ($active == 2) echo " active"; ?>" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="categories.php">Ajouter</a></li>
							<li><a href="categories.php?type=modif">Modifier</a></li>
							<li><a href="categories.php?type=del">Supprimer</a></li>
						</ul>
					</li>
				<li><a href="#">Stats</a></li>
				<?php endif ?>
			</ul>
			 <ul class="nav navbar-nav navbar-right">
				<li>
					<div class="bar3000">Bar Parallèle 3000</div>
				</li>
				<li>
					<a href="logout.php" role="button" class="glyphicon glyphicon-log-out"></a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>