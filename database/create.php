<?php

include('connect.php');

if(isset($_POST['create-product'])){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	$name =  $conn->real_escape_string(htmlentities(trim($_POST['name'])));
	$price =  $conn->real_escape_string(htmlentities(trim($_POST['price'])));
	$qty =  $conn->real_escape_string(htmlentities(trim($_POST['qty'])));
	$description =  $conn->real_escape_string(htmlentities(trim($_POST['description'])));

	$sql = "INSERT INTO products (name, price, qty, description)
	VALUES ('{$name}', '{$price}', '{$qty}','{$description}')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
	
		<form action="create.php" method="post">
			Name: <br>
			<input type="text" name="name" /><br>
			Price:<br>
			<input type="number" name="price" /><br>			
			Qty:<br>
			<input type="number" name="qty" /><br>
			Description<br>
			<textarea name="description"></textarea>
			<br><br>
			<input type="submit" name="create-product" value="buy now"/>
		</form>
	</body>
</html>