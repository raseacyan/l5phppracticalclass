<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isset($_REQUEST['id'])){
	redirectTo("course_list.php");
}

$course = getCourseById($_REQUEST['id'], $conn);

if(isset($_POST['submit'])){
	$link = $conn->real_escape_string(htmlentities(trim($_POST['link'])));
	$course_id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));
	$teacher_id = $_SESSION['user_id'];

	$table = "resources";
	$data = array(
		'link' => $link,
		'course_id' => $course_id,
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
<h1>Add Resource</h1>

<form action="add_resource_form.php" method="post">
	<label>Resource Link</label><br>
	<input type="text" name="link"/><br>
	
	<input type="hidden" name="id" value="<?php echo $course['id']; ?>"/>

	<br><input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>