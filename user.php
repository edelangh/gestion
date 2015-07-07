<?php require_once("header.php"); ?>
<div class="container">
	<form id="add_user" action="add_user.php" method="POST">
		<div class="form-group">
			<label for="name">Nom</label>
			<input type="text" class="form-control" name="user" placeholder="Nom" autofocus>
		</div>

		<div class="form-group">
			<label for="name">Password</label>
			<input type="password" class="form-control" name="pass" placeholder="Password">
		</div>

		<button type="submit" name="loc" class="btn btn-primary">Submit</button>
	</form>
</div>
<?php require_once("footer.php"); ?>
