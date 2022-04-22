<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$teachers = getTeachers($conn);

if(isset($_POST['submit'])){
	$title = $conn->real_escape_string(htmlentities(trim($_POST['title'])));
	$description = $conn->real_escape_string(htmlentities(trim($_POST['description'])));
	$teacher_id = $conn->real_escape_string(htmlentities(trim($_POST['teacher_id'])));	

	$table = "courses";
	$data = array(
		'title' => $title,
		'description' => $description,
		'teacher_id' => $teacher_id
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
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>
<h1>Add Course</h1>

<form action="course_create.php" method="post">
	<label>Course Title</label><br>
	<input type="text" name="title"/><br>

	<label>Description</label><br>
	<textarea name="description"></textarea><br>

	<label>Teacher</label><br>
	<select name="teacher_id">
		<?php foreach($teachers as $teacher): ?>
			<option value="<?php echo $teacher['id']; ?>"><?php echo $teacher['username']; ?></option>
		<?php endforeach; ?>
	</select><br>


	<br><input type="submit" name="submit" value="Submit"/>

</form>



</body>
</html>