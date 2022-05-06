<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isset($_REQUEST['id'])){
	redirectTo("course_list.php");
}

$course = getCourseById($_REQUEST['id'], $conn);

$class = getClassByClassId($_REQUEST['class_id'], $conn);

$students = getEnrolledStudentsByCourseId($course['id'], $conn);


if(isset($_POST['submit'])){
	$course_id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));

	$present_list = array();

	if(isset($_POST['student_id'])){
		foreach($students as $student){
			if(in_array($student['id'], $_POST['student_id'])){
				array_push($present_list, array('id'=>$student['id'], 'status'=>'present', 'class_id'=> $class['id']));			
			}else{
				array_push($present_list, array('id'=>$student['id'], 'status'=>'absent', 'class_id'=> $class['id'] ));
			}
		}
	}else{
		foreach($students as $student){
			array_push($present_list, array('id'=>$student['id'], 'status'=>'absent', 'class_id'=> $class['id'] ));
		}
	}

	foreach($present_list as $element){
		$table = "attendances";
		$data = array(
			'student_id'=> $element['id'],
			'class_id' => $element['class_id'],
			'status'=> $element['status']	
		);

		$result = createRecord($table, $data, $conn);

		if(!$result){
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
<h1>Attendance Form</h1>

<form action="attendance_create.php?id=<?php echo $_GET['id']; ?>&&class_id=<?php echo $_GET['class_id']; ?>" method="post">
	<label>Date</label><br>
	<input type="date" name="date" value="<?php echo $class['date']; ?>" disabled/><br><br>

	<label>Students</label><br>
	
	<?php foreach($students as $student): ?>
		<input type="checkbox" name="student_id[]" value="<?php echo $student['id']; ?>"><?php echo $student['username']; ?><br>
	<?php endforeach; ?>
	
	
	<input type="hidden" name="id" value="<?php echo $course['id']; ?>"/>
	<input type="hidden" name="class_id" value="<?php echo $class['id']; ?>"/>

	<br><input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>