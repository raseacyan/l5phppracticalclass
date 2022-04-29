<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isset($_REQUEST['id'])){
	redirectTo("course_list.php");
}

$course = getCourseById($_REQUEST['id'], $conn);
$student = getStudentById($_SESSION['user_id'], $conn);

if(isset($_POST['submit'])){
	$student_id = $conn->real_escape_string(htmlentities(trim($_POST['student_id'])));
	$course_id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));	

	

	if(isEnrolled($student_id, $course_id, $conn)){
		echo "You have already enrolled to this course";
	}else{

		$table = "enrolments";
		$data = array(
			'student_id' => $student_id,
			'course_id' => $course_id	
		);

		$result = createRecord($table, $data, $conn);

		if($result){
			echo "saved successfully";
		}else{
			echo "error";
		}
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
<h1>Enroll Form</h1>

<form action="enroll_form.php" method="post">
	<label>Course Title</label><br>
	<input type="text" name="course_title" value="<?php echo $course['title']; ?>" disabled/><br>
	
	<label>Student Name</label><br>
	<input type="text" name="student_name"  value="<?php echo $student['username']; ?>" disabled/><br>

	<input type="hidden" name="student_id" value="<?php echo $student['id']; ?>"/>
	<input type="hidden" name="id" value="<?php echo $course['id']; ?>"/>


	
	<br><input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>