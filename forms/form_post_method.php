<?php

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	echo "Hello {$name}";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Form (POST)</h1>
		<form action="form_post_method.php" method="post">
			Name: <input type="text" name="name"/>
		
			<input type="submit" name="submit" value="enter"/>
		</form>
	</body>
</html>