<?php if (isset($_GET['code']))
	var_dump($_GET['code']) ?>

<form action="barcode.php">
	<input type="text" name="code" autofocus/>
	<input type="submit"/>
</form>