<?php
session_start();
include('../inc/functions.php');
include('../inc/connection.php');

if(!isAdminLogin()){
	redirectTo("login.php");
}

if(isset($_POST['submit'])){
	$username = $conn->real_escape_string(htmlentities(trim($_POST['username'])));
	$position = $conn->real_escape_string(htmlentities(trim($_POST['position'])));
	$email = $conn->real_escape_string(htmlentities(trim($_POST['email'])));
	$password = $conn->real_escape_string(htmlentities(trim($_POST['password'])));
	$password = md5($password);

	$table = "teachers";
	$data = array(
		'username' => $username,
		'position' => $position,
		'email' => $email,
		'password' => $password
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
<h1>Add Teacher</h1>

<form action="teacher_create.php" method="post">
	<label>Full Name</label><br>
	<input type="text" name="username"/><br>

	<label>Position</label><br>
	<input type="text" name="position"/><br>
	
	<label>Email</label><br>
	<input type="text" name="email"/><br>
	
	<label>Password</label><br>
	<input type="password" name="password"/><br>

	<br><input type="submit" name="submit" value="Submit"/>

</form>



</body>
</html>