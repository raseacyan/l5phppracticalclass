<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}



if(isset($_POST['update-doctor'])){

	$name = $conn->real_escape_string(htmlentities(trim($_POST['name'])));
	$department = $conn->real_escape_string(htmlentities(trim($_POST['department'])));
	$consultation_time = $conn->real_escape_string(htmlentities(trim($_POST['consultation_time'])));

	$id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));
	$table = "doctors";
	$data = array(
		'name' => $name,
		'department' => $department,
		'consultation_time' => $consultation_time
	);

	$result = updateRecord($table, $data, $id, $conn);

	if($result){
		echo "saved successfully";
	}else{
		echo "error";
	}
}

$id = (isset($_REQUEST['id']))?$_REQUEST['id']:0;
$doctor = getDoctorById($id, $conn);

?>
<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("nav.php"); ?>
<h1>Edit Doctor</h1>

<form action="doctors_update.php" method="post">

Doctor Name:<br>
<input type="text" name="name" value="<?php echo $doctor['name']; ?>"/><br>
Department:<br>
<select name="department">
<option value="neuro" <?php echo ($doctor['department']=="neuro")?'selected':''; ?>>Neuro</option>
<option value="cardio" <?php echo ($doctor['department']=="cardio")?'selected':''; ?>>Cardio</option>
</select><br>
Consultation Time: <br>
<textarea name="consultation_time"><?php echo $doctor['consultation_time']; ?></textarea>

<input type="hidden" name="id" value="<?php echo $doctor['id']; ?>"/>
<br><br>
<input type="submit" name="update-doctor" value="Add"/>


</form>

</body>
</html>