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
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>
<h1>Hello Admin</h1>



</body>
</html>