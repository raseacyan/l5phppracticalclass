<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;

if($id==0){
	redirectTo("teacher_list.php");
}



if(isset($_POST['submit'])){
	$username = $conn->real_escape_string(htmlentities(trim($_POST['username'])));
	$position = $conn->real_escape_string(htmlentities(trim($_POST['position'])));
	$email = $conn->real_escape_string(htmlentities(trim($_POST['email'])));
	$id = $conn->real_escape_string(htmlentities(trim($_POST['id'])));

	$table = "teachers";
	$data = array(
		'username' => $username,
		'position' => $position,
		'email' => $email,
	);


	$result = updateRecord($table, $data, $id, $conn);

	if($result){
		echo "saved successfully";
		redirectTo("teacher_update.php?id=".$id);
	}else{
		echo "error";
	}
}

$teacher = getTeacherById($id, $conn);
?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php if(isLogin()): ?>
	<p>You are login as: <?php echo $_SESSION['username']; ?></p>
<?php endif; ?>

<?php include("inc/nav.php"); ?>
<h1>Update Teacher</h1>

<form action="teacher_update.php" method="post">
	<label>Full Name</label><br>
	<input type="text" name="username" value="<?php echo $teacher['username']; ?>"/><br>

	<label>Position</label><br>
	<input type="text" name="position" value="<?php echo $teacher['position']; ?>"/><br>
	
	<label>Email</label><br>
	<input type="text" name="email" value="<?php echo $teacher['email']; ?>"/><br>


	<input type="hidden" name="id" value="<?php echo $teacher['id']; ?>"/>
	


	<br><input type="submit" name="submit" value="Submit"/>

</form>



</body>
</html>