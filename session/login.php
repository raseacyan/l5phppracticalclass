<?php
session_start();

if(isset($_POST['login'])){
	$name = $_POST['name'];
	$password = $_POST['password'];
	if($name == "test" && $password = 123){
		$_SESSION['login'] = true;
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Login</h1>
		<form action="login.php" method="post"> 
			name: <input type="text" name="name"/><br>
			password: <input type="password" name="password"/><br>
			<input type="submit" name="login" value="enter"/>
		</form>
	</body>
</html>