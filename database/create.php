<?php

include('connect.php');
include('functions.php');

if(isset($_POST['create-product'])){

	//senitize
	$name = $conn->real_escape_string(htmlentities(trim($_POST['name'])));
	$price = $conn->real_escape_string(htmlentities(trim($_POST['price'])));
	$qty = $conn->real_escape_string(htmlentities(trim($_POST['qty'])));
	$description = $conn->real_escape_string(htmlentities(trim($_POST['description'])));
	$category = $conn->real_escape_string(htmlentities(trim($_POST['category'])));

	$data = array(
		'name' => $name,
		'price' =>  $price,
		'qty' =>  $qty,
		'description' => $description,
		'category' =>  $category	
	);


	$table = "products";

	$result = createRecord($table, $data, $conn);

	if($result){
		header('location:listview.php');
	}

}

//to get categories
$categories = getCategories($conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>

		<h1>Add Product</h1>
		<p><a href="listview.php">Back to product list</a></p>
	
		<form action="create.php" method="post">
			Name: <br>
			<input type="text" name="name" /><br>
			Price:<br>
			<input type="number" name="price" /><br>			
			Qty:<br>
			<input type="number" name="qty" /><br>
			Description<br>
			<textarea name="description"></textarea><br>
			Category<br>			
			<select name="category">
				<?php foreach($categories as $category): ?>
				<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
				<?php endforeach; ?>		
			</select><br><br>
			<br><br>
			<input type="submit" name="create-product" value="add"/>
		</form>
	</body>
</html>