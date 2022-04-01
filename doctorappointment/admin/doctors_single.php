<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$doctor = getDoctorById($id, $conn);
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("nav.php"); ?>
<h1><?php echo $doctor['name']; ?></h1>
<p>
	<strong>Department:</strong> <?php echo $doctor['department']; ?> <br>
	<strong>Consultation Time:</strong> <?php echo $doctor['consultation_time']; ?>
</p>



</body>
</html>