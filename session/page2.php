<?php
sesssion_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Page 2</h1>
		<p><?php echo $_SESSION['name']; ?></p>
	</body>
</html>