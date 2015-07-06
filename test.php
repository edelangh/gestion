<?php
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=serveur;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Bar Parallele 3000</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.prod_box {
			height: 120px;
			width: 120px;
			filter: grayscale(100%);
		}
		
		.checked {
			filter: grayscale(0%);
		}

		.txt {
			width: 100px;
			height: 30px;
			margin-top: 45px;
			margin-left: 10px;
			display: none;
		}

	</style>
	</head>
	<body>

</head>
<body>
	<?php if (isset($_POST)) var_dump($_POST)?>

	<form action="test.php" method="POST">
		<div class="prod_box unchecked" style="background-image: url(img/Item/F12.png)">
		    <input type="checkbox" name="F12" value="" style="display: none" />
			<input type="text" class="txt">
		</div>

		<div class="prod_box" class="unchecked" style="background-image: url(img/Item/F13.png)">
		    <input type="checkbox" name="F13" value="" style="display: none" />
			<input type="text" class="txt">
		</div>
		<input type="submit">
	</form>

		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/select.js"></script>
		<script>

$(document).ready(function(){

	$('.prod_box').mousedown(function(event) {
		var item = $(this);
		if (event.which == 1)
		{
			var txt = $(this).children("input[type=text]");
			if( !$(item).is('.checked')){
				$(this).addClass('checked');
				$(this).children("input[type=checkbox]").prop('checked', true);

				$(txt).toggle(function () {
					$(this).focus();
				});

				$(txt).change(function() {
					$(item).children("input[type=checkbox]").val($(this).val());
				});

			} else {
				$(this).removeClass('checked');
				$(this).children("input").prop('checked', false);

				$(txt).toggle();
			}
		}
	});

});

		</script>
	</body>
</html>