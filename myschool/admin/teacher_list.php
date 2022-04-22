<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$teachers = getTeachers($conn);


?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>

<h1>Teacher List</h1>
<p><a href="teacher_create.php">Add Teacher</a></p>

<?php if($teachers): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Name</th>	
			<th>Position</th>
			<th>Email</th>			
		</tr>

		<?php foreach($teachers as $teacher): ?>
		<tr>
			<td><a href="teacher_single.php?id=<?php echo $teacher['id']; ?>"><?php echo $teacher['username']; ?></a></td>
			<td><?php echo $teacher['position']; ?></a></td>
			<td><?php echo $teacher['email']; ?></a></td>
			<td>
				<a href="teacher_update.php?id=<?php echo $teacher['id'] ?>">Update</a> |
				<a href="teacher_delete.php?id=<?php echo $teacher['id']; ?>">Delete</a>
			</td>
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>



</body>
</html>