<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$class = getClassByClassId($_REQUEST['id'], $conn);

$attendances = getAttendancesByClassId($class['id'], $conn);

?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>

<h1>Attendance For <?php echo $class['date']; ?></h1>
<a href="course_single.php?id=<?php echo $class['course_id']; ?>"> << back </a>

<?php if($attendances): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Date</th>			
			<th>Course</th>
			<th>Student Name</th>
			<th>Status</th>			
		</tr>

		<?php foreach($attendances as $attendance): ?>
		<tr>
			
			<td><?php echo $attendance['date']; ?></a></td>
			<td><?php echo $attendance['title']; ?></a></td>
			<td><?php echo $attendance['username']; ?></a></td>
			<td><?php echo $attendance['status']; ?></a></td>
			
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>






</body>
</html>