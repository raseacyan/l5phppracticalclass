<?php
session_start();

if(!isset($_SESSION['cart'])){
$_SESSION['cart']= array();
}


if(isset($_POST['add-to-cart'])){



	$product = array(
		'id'=>$_POST['id'],
		'name'=>$_POST['name']
	);

	array_push($_SESSION['cart'], $product);

}

echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";

?>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Products</h1>

		<div>
			name: iphone 12<br>
			price: 100 <br>
			<form action="products.php" method="post">
				<input type="hidden" name="id" value="1"/>
				<input type="hidden" name="name" value="iphone"/>
				<input type="submit" value="add to cart" name="add-to-cart"/>
			</form>
		</div>

		<div>
			name: samsung s22<br>
			price: 100 <br>
			<form action="products.php" method="post">
				<input type="hidden" name="id" value="2"/>
				<input type="hidden" name="name" value="samsung"/>
				<input type="submit" value="add to cart" name="add-to-cart"/>
			</form>
		</div>

		<div>
			name: Sony<br>
			price: 100 <br>
			<form action="products.php" method="post">
				<input type="hidden" name="id" value="3"/>
				<input type="hidden" name="name" value="sony"/>
				<input type="submit" value="add to cart" name="add-to-cart"/>
			</form>
		</div>
		
	</body>
</html>