<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$students = getStudents($conn);


?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>

<h1>Student List</h1>
<p><a href="student_create.php">Add Students</a></p>

<?php if($students): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Name</th>			
			<th>Email</th>			
		</tr>

		<?php foreach($students as $student): ?>
		<tr>
			<td><a href="student_single.php?id=<?php echo $student['id']; ?>"><?php echo $student['username']; ?></a></td>		
			<td><?php echo $student['email']; ?></a></td>
			<td>
				<a href="student_update.php?id=<?php echo $student['id'] ?>">Update</a> |
				<a href="student_delete.php?id=<?php echo $student['id']; ?>">Delete</a>
			</td>
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>



</body>
</html>