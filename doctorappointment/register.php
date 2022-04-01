<?php
session_start();
include('inc/connection.php');
include('inc/functions.php');

if(isset($_POST['register'])){
	$username = $conn->real_escape_string(htmlentities(trim($_POST['username'])));
	$phone = $conn->real_escape_string(htmlentities(trim($_POST['phone'])));
	$address = $conn->real_escape_string(htmlentities(trim($_POST['address'])));
	$password = $conn->real_escape_string(htmlentities(trim($_POST['password'])));
	$password = md5($password);

	$table = "users";
	$data = array(
		'username' => $username,
		'phone' => $phone,
		'address' => $address,
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
<?php include("inc/nav.php"); ?>
<h1>Register</h1>

<form action="register.php" method="post">
	<label>Username</label><br>
	<input type="text" name="username"/><br>
	
	<label>Phone</label><br>
	<input type="text" name="phone"/><br>
	
	<label>Address</label><br>
	<input type="text" name="address"/><br>
	
	<label>Password</label><br>
	<input type="text" name="password"/><br>

	<br><input type="submit" name="register" value="Register"/>

</form>
</body>
</html>