<?php
session_start();
include('../inc/connection.php');
include('../inc/functions.php');


if(isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = md5($password);

	$user = checkUser("admin", $email, $password, $conn);



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
<h1>Admin Login</h1>

<form action="login.php" method="post">
	email: <input type="text" name="email"/>
	password: <input type="password" name="password" />
	<input type="submit" name="login" value="submit"/>
</form>

</body>
</html>