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
				BRAND
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
				<li class="dropdown<?php if ($active == 1) echo " active"; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="products.php">Ajouter</a></li>
						<li><a href="#">Modifier</a></li>
						<li><a href="#">Supprimer</a></li>
					</ul>
				</li>
				<li class="dropdown<?php if ($active == 2) echo " active"; ?>" >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Ajouter</a></li>
						<li><a href="#">Modifier</a></li>
						<li><a href="#">Supprimer</a></li>
					</ul>
				</li>
				<li><a href="#">Stats</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>