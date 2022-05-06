<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$course = getCourseById($id, $conn);
$resources = getResourcesByCourseId($course['id'], $conn);
$classes = getClassesByCourseId($course['id'], $conn);

$isEnrolled = isEnrolled($_SESSION['user_id'], $course['id'], $conn);

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
<?php if($isEnrolled == TRUE): ?>
<hr>

<h3>Classes</h3>

<?php if($classes): ?>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<th>Date</th>			
			<th>Time</th>
			<th>Topic</th>	
			<th>Link</th>
			<th>Venue</th>		
		</tr>

		<?php foreach($classes as $class): ?>
		<tr>
			<td><?php echo $class['date']; ?></td>		
			<td><?php echo $class['time']; ?></td>			
			<td><?php echo $class['topic']; ?></td>		
			<td><?php echo $class['link']; ?></td>
			<td><?php echo $class['venue']; ?></td>
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

<?php endif; ?>

<?php endif; ?>



</body>
</html>