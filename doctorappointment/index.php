<?php
session_start();
include('inc/functions.php');
/*
if(!isLogin()){
	redirectTo("login.php");
}*/
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("inc/nav.php"); ?>
<?php
	if(isLogin()){
		echo "<p>you are logged in as {$_SESSION['username']}</p>";
	}
?>
<h1>Welcome to ABC Clinic</h1>



</body>
</html>