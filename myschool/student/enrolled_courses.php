<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$courses = getCoursesByStudentId($_SESSION['user_id'], $conn);
$student = getStudentById($_SESSION['user_id'], $conn);

?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>

<h1>My Enrolled Courses</h1>

<?php if($courses): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Title</th>			
			<th>Description</th>			
		</tr>

		<?php foreach($courses as $course): ?>
		<tr>
			<td><a href="course_single.php?id=<?php echo $course['id']; ?>"><?php echo $course['title']; ?></a></td>		
			<td><?php echo $course['description']; ?></a></td>
			<td>
				<?php if(!isEnrolled($student['id'], $course['id'], $conn)): ?>
					<a href="enroll_form.php?id=<?php echo $course['id'] ?>">Enroll</a>
				<?php endif; ?>
			   
				
				
			</td>
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>



</body>
</html>