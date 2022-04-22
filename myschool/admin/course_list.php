<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$courses = getCourses($conn);


?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>

<h1>Course List</h1>
<p><a href="course_create.php">Add Course</a></p>

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
				<a href="course_update.php?id=<?php echo $course['id'] ?>">Update</a> |
				<a href="course_delete.php?id=<?php echo $course['id']; ?>">Delete</a>
			</td>
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>



</body>
</html>