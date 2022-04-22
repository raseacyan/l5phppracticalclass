<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$teacher = getTeacherById($id, $conn);
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("inc/nav.php"); ?>
<h1><?php echo $teacher['username']; ?></h1>
<p>
	<strong>Position:</strong> <?php echo $teacher['position']; ?> <br>
	<strong>Email:</strong> <?php echo $teacher['email']; ?>
</p>



</body>
</html>