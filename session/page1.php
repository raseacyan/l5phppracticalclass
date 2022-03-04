<?php
session_start();
$_SESSION['name'] = "Effy";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Page 1</h1>
		<p><?php echo $_SESSION['name']; ?></p>
	</body>
</html>