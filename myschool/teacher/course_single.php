<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$course = getCourseById($id, $conn);

$students = getEnrolledStudentsByCourseId($course['id'], $conn);

$resources = getResourcesByCourseId($course['id'], $conn);

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

<hr>


<h3>Enrolled Students</h3>

<?php if($students): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Name</th>			
			<th>Email</th>			
		</tr>

		<?php foreach($students as $student): ?>
		<tr>
			<td><?php echo $student['username']; ?></td>		
			<td><?php echo $student['email']; ?></td>			
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>

<hr>

<h3>Resources</h3>

<?php if($resources): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Link</th>			
			<th>Created On</th>			
		</tr>

		<?php foreach($resources as $resource): ?>
		<tr>
			<td><a href="<?php echo $resource['link']; ?>">💾 Download</a></td>		
			<td><?php echo $resource['created_on']; ?></td>			
			
		</tr>
		<?php endforeach; ?>

	</table>

<?php else: ?>

	<p>No Records</p>

<?php endif ?>

</body>
</html>