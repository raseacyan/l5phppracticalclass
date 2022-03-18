<?php

include('connect.php');
include('functions.php');

$id = isset($_REQUEST['id'])? $_REQUEST['id']: 0;

$sql = "SELECT * FROM products WHERE id={$id} ";
$result = $conn->query($sql);


$fruit = array();
if ($result->num_rows > 0) { 
   $row = $result->fetch_assoc();
   $fruit = $row; 
}


//to get categories

$categories = getCategories($conn);




if(isset($_POST['update'])){
	
	//senitize
	$name = $conn->real_escape_string(htmlentities(trim($_POST['name'])));
	$price = $conn->real_escape_string(htmlentities(trim($_POST['price'])));
	$qty = $conn->real_escape_string(htmlentities(trim($_POST['qty'])));
	$description = $conn->real_escape_string(htmlentities(trim($_POST['description'])));
	$category = $conn->real_escape_string(htmlentities(trim($_POST['category'])));

	$id = $_POST['id'];

	$sql = "UPDATE products SET name='{$name}', price='{$price}', qty='{$qty}', description='{$description}', category='{$category}' WHERE id={$id}";

	if ($conn->query($sql) === TRUE) {
	  header('Location:listview.php');
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

		<h1>Update Product</h1>
		<p><a href="listview.php">Back to product list</a></p>
	
		<form action="update.php" method="post">
			Name: <br>
			<input type="text" name="name" value="<?php echo $fruit['name']; ?>"/><br>
			Price:<br>
			<input type="number" name="price" value="<?php echo $fruit['price']; ?>"/><br>			
			Qty:<br>
			<input type="number" name="qty" value="<?php echo $fruit['qty']; ?>"/><br>
			Description<br>
			<textarea name="description"><?php echo $fruit['description']; ?></textarea>
			<br>
			Category:<br>
			<select name="category">
				<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>" <?php echo ($fruit['category']=='Import')?"selected":""; ?>><?php echo $category['name']; ?></option>
				<?php endforeach; ?>		
			</select><br><br>

			<input type="hidden" name="id" value="<?php echo $fruit['id'] ?>"/>

			<input type="submit" name="update" value="submit"/>
		</form>
	</body>
</html>