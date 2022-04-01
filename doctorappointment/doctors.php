
<?php
session_start();
include('inc/connection.php');
include('inc/functions.php');

if(!isLogin()){
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
		<?php include("inc/nav.php"); ?>
		<h1>Doctor List</h1>

		<?php if($doctors): ?>

			<table cellspacing="10" cellpadding="10">
				<tr>
					<th>Name</th>	
					<th>Department</th>
					<th>Consultation Time</th>
					<th>Action</th>			
				</tr>

				<?php foreach($doctors as $doctor): ?>
				<tr>
					<td><a href="doctors_single.php?id=<?php echo $doctor['id']; ?>"><?php echo $doctor['name']; ?></a></td>
					<td><?php echo ucfirst($doctor['department']); ?></a></td>
					<td><?php echo $doctor['consultation_time']; ?></a></td>
					<td>
						<a href="appointment_form.php?id=<?php echo $doctor['id']; ?>">Make appointment</a>
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