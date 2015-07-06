<?php require_once("header.php"); ?>
	<div class="container">
		<form action="feedback.php" method="POST">
			<div class="form-group">
				<label for="comment">Lache T com' :</label>
  				<textarea class="form-control" rows="5" name="comment"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
<?php require_once("footer.php"); ?>