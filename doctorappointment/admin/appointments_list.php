
<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

if(isset($_GET['date']) && isset($_GET['doctor_id'])){
	$appointments = getAppointmentsByDateAndDoctorId($_GET['date'], $_GET['doctor_id'], $conn);
}else{
	$appointments = getAppointments($conn);
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
		<br><br>
		<form action="appointments_list.php" method="get">
			date: <input type="date" name="date"/>		
			doctor: 
				<select name="doctor_id">
					<?php foreach($doctors as $doctor): ?>
						<option value="<?php echo $doctor['id']; ?>"><?php echo $doctor['name']; ?></option>
					<?php endforeach; ?>
				</select>
			<input type="submit" name="filter" value="filter"/>
		</form>
		<h1>Appointment List</h1>		

		<?php if($appointments): ?>

			<table cellspacing="10" cellpadding="10">
				<tr>
					<th>Booking ID</th>	
					<th>Appointment Date</th>	
					<th>Appointment Time</th>
					<th>Doctor ID</th>	
					<th>Patient Name</th>
					<th>Patient Phone</th>
					<th>Patient Address</th>
					<th>Patient Age</th>


							
				</tr>

				<?php foreach($appointments as $appointment): ?>
				<tr>
					<td><?php echo $appointment['booking_id']; ?></td>
					<td><?php echo $appointment['appointment_date']; ?></td>
					<td><?php echo $appointment['appointment_time']; ?></td>
					<td><?php echo $appointment['name']; ?></td>
					<td><?php echo $appointment['patient_name']; ?></td>
					<td><?php echo $appointment['patient_phone']; ?></td>
					<td><?php echo $appointment['patient_address']; ?></td>
					<td><?php echo $appointment['patient_age']; ?></td>				
					
				</tr>
				<?php endforeach; ?>

			</table>

		<?php else: ?>

			<p>There are no data</p>

		<?php endif ?>
		
	</body>
</html>
<?php $conn->close(); ?>