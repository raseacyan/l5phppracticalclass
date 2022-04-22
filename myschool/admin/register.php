<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');

if(isset($_POST['register'])){
	$username = $conn->real_escape_string(htmlentities(trim($_POST['username'])));
	$email = $conn->real_escape_string(htmlentities(trim($_POST['email'])));
	$password = $conn->real_escape_string(htmlentities(trim($_POST['password'])));
	$password = md5($password);

	$table = "admin";
	$data = array(
		'username' => $username,
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

<h1>Admnin Register</h1>

<form action="register.php" method="post">
	<label>Full Name</label><br>
	<input type="text" name="username"/><br>
	
	<label>Email</label><br>
	<input type="text" name="email"/><br>
	
	<label>Password</label><br>
	<input type="password" name="password"/><br>

	<br><input type="submit" name="register" value="Register"/>

</form>
</body>
</html>