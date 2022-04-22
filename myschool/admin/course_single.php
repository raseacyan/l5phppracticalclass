<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$course = getCourseById($id, $conn);
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("inc/nav.php"); ?>
<h1><?php echo $course['title']; ?></h1>

<p>
	<strong>Description:</strong> <br>
	<?php echo $course['description']; ?> <br>
	<strong>Teacher:</strong>	<br>
	<?php echo $course['teacher_name']; ?> <br>
</p>



</body>
</html>