<?php
session_start();
include('inc/connection.php');
include('inc/functions.php');


if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$user = checkUser($username, $password, $conn);

	if($user){		
		$_SESSION['username'] = $user['username'];
		$_SESSION['user_id'] = $user['id'];
		redirectTo('index.php');
	}else{
		//redirectTo('login.php');
		echo "Login Failed";

	}
}

?>

<!DOCTYPE>
<html>
<head><title>Sample Project</title></head>
<body>
<?php include("inc/nav.php"); ?>
<h1>User Login</h1>

<form action="login.php" method="post">
	name: <input type="text" name="username"/>
	password: <input type="password" name="password" />
	<input type="submit" name="login" value="submit"/>
</form>

</body>
</html>