<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(!isset($_REQUEST['id'])){
	redirectTo("course_list.php");
}

$course = getCourseById($_REQUEST['id'], $conn);

if(isset($_POST['submit'])){
	$date = $conn->real_escape_string(htmlentities(trim($_POST['date'])));
	$time = $conn->real_escape_string(htmlentities(trim($_POST['time'])));
	$topic = $conn->real_escape_string(htmlentities(trim($_POST['topic'])));
	$link = $conn->real_escape_string(htmlentities(trim($_POST['link'])));
	$venue = $conn->real_escape_string(htmlentities(trim($_POST['venue'])));
	$id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));
	

	$table = "classes";
	$data = array(
		'date' => $date,
		'time' => $time,
		'topic' => $topic,
		'link' => $link,
		'venue' => $venue,
		'course_id' => $id
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
<h1>Add Class</h1>

<form action="class_create.php" method="post">
	<label>Date</label><br>
	<input type="date" name="date"/><br>

	<label>Time</label><br>
	<input type="text" name="time"/><br>

	<label>Topic</label><br>
	<input type="text" name="topic"/><br>

	<label>Link</label><br>
	<input type="text" name="link"/><br>

	<label>Venue</label><br>
	<select name="venue">
		<option value="online">Online</option>
		<option value="on campus">On Campus</option>
		<option value="pre-recorded">Pre-Recoreded</option>
	</select><br>
	
	<input type="hidden" name="id" value="<?php echo $course['id']; ?>"/>

	<br><input type="submit" name="submit" value="Submit"/>

</form>
</body>
</html>