<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

adminRedirectIfNotLogin();


if(isset($_POST['add-doctor'])){
	$name = $conn->real_escape_string(htmlentities(trim($_POST['name'])));
	$department = $conn->real_escape_string(htmlentities(trim($_POST['department'])));
	$consultation_time = $conn->real_escape_string(htmlentities(trim($_POST['consultation_time'])));

	$table = "doctors";
	$data = array(
		'name' => $name,
		'department' => $department,
		'consultation_time' => $consultation_time
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
<?php include("nav.php"); ?>
<h1>Add Doctor</h1>

<form action="doctors_create.php" method="post">

Doctor Name:<br>
<input type="text" name="name" /><br>
Department:<br>
<select name="department">
<option value="neuro">Neuro</option>
<option value="cardio">Cardio</option>
</select><br>
Consultation Time: <br>
<textarea name="consultation_time"></textarea>
<br><br>
<input type="submit" name="add-doctor" value="Add"/>
</form>



</body>
</html>