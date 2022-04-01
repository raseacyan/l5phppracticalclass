<?php
session_start();
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("nav.php"); ?>
<h1>Hello Admin</h1>



</body>
</html>