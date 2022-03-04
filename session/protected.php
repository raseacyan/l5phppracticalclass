<?php
session_start();

if($_SESSION['login'] == false){
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Only logged in user can see this page</h1>
		
	</body>
</html>