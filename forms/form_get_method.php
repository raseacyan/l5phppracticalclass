<?php

if(isset($_GET['enter'])){
	$name = $_GET['name'];
	echo "Hello {$name}";

}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Form (GET)</h1>
		<form action="form_get_method.php" method="get">
			Name: <input type="text" name="name"/>		
		
			<input type="submit" name="enter" value="enter"/>
		</form>
	</body>
</html>