
<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$doctors = getDoctors($conn);


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<?php include("nav.php"); ?>
		<h1>Doctor List</h1>

		<p><a href="doctors_create.php">Add Doctor</a></p>


		<?php if($doctors): ?>

			<table cellspacing="10" cellpadding="10">
				<tr>
					<th>Name</th>	
					<th>Department</th>
					<th>Consultation Time</th>			
				</tr>

				<?php foreach($doctors as $doctor): ?>
				<tr>
					<td><a href="doctors_single.php?id=<?php echo $doctor['id']; ?>"><?php echo $doctor['name']; ?></a></td>
					<td><?php echo ucfirst($doctor['department']); ?></a></td>
					<td><?php echo $doctor['consultation_time']; ?></a></td>
					<td>
						<a href="doctors_update.php?id=<?php echo $doctor['id'] ?>">Update</a> |
						<a href="doctors_delete.php?id=<?php echo $doctor['id']; ?>">Delete</a>
					</td>
					
				</tr>
				<?php endforeach; ?>

			</table>

		<?php else: ?>

			<p>There are no fruits</p>

		<?php endif ?>
		
	</body>
</html>
<?php $conn->close(); ?>