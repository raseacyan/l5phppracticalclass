<?php
session_start();
include('inc/connection.php');
include('inc/functions.php');

if(!isLogin()){
	redirectTo("login.php");
}

$id = (isset($_GET['id']))?$_GET['id']:0;

$doctors = getDoctors($conn);
$user = getUserById($_SESSION['user_id'],$conn);


if(isset($_POST['add-appoinment'])){
	$patient_name = $conn->real_escape_string(htmlentities(trim($_POST['patient_name'])));
	$patient_phone = $conn->real_escape_string(htmlentities(trim($_POST['patient_phone'])));
	$patient_address = $conn->real_escape_string(htmlentities(trim($_POST['patient_address'])));
	$patient_age = $conn->real_escape_string(htmlentities(trim($_POST['patient_age'])));
	$appointment_date = $conn->real_escape_string(htmlentities(trim($_POST['appointment_date'])));
	$appointment_time = $conn->real_escape_string(htmlentities(trim($_POST['appointment_time'])));
	$doctor_id = $conn->real_escape_string(htmlentities(trim($_POST['doctor_id'])));
	$user_id = $conn->real_escape_string($_SESSION['user_id']);	


	$table = "appointments";
	$data = array(
		'patient_name' => $patient_name,
		'patient_phone' => $patient_phone,
		'patient_address' => $patient_address,
		'patient_age' => $patient_age,
		'appointment_date' => $appointment_date,
		'appointment_time' => $appointment_time,
		'doctor_id' => $doctor_id,
		'user_id' => $user_id,

	);

	$result = createRecord($table, $data, $conn);

	if($result){
		echo "saved successfully";
	}else{
		echo "error";
	}
}

?>
<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("inc/nav.php"); ?>
<h1>Doctor Appointment Form</h1>

<form action="appointment_form.php" method="post">

Doctor:<br>
<select name="doctor_id">
	<?php foreach($doctors as $doctor): ?>
		<option value="<?php echo $doctor['id']; ?>" <?php echo ($doctor['id']==$id)?'selected':''; ?>><?php echo $doctor['name']; ?></option>
	<?php endforeach; ?>
</select><br>

Date:<br>
<input type="date" name="appointment_date"/><br>

Time:<br>
<select name="appointment_time">
	<option value="10am-12pm">10am-12pm</option>
	<option value="12pm-2pm">12pm-2pm</option>
	<option value="2pm-4pm">2pm-4pm</option>
	<option value="4pm-6pm">4pm-6pm</option>
	<option value="6pm-8pm">6pm-8pm</option>
</select><br>

Patient Name:<br>
<input type="text" name="patient_name" value="<?php echo $user['username'] ?>"/><br>

Patient Phone:<br>
<input type="text" name="patient_phone" value="<?php echo $user['phone'] ?>"/><br>

Patient Address:<br>
<input type="text" name="patient_address" value="<?php echo $user['address'] ?>"/><br>

Patient Age:<br>
<input type="number" name="patient_age"/><br>

<br><br>
<input type="submit" name="add-appoinment" value="Add"/>
</form>



</body>
</html>