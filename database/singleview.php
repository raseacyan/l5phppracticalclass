<?php
include('connect.php');

$id = isset($_GET['id'])? $_GET['id']: 0;

$sql = "SELECT * FROM products WHERE id={$id} ";
$result = $conn->query($sql);

$fruit = array();
if ($result->num_rows > 0) { 
   $row = $result->fetch_assoc();
   $fruit = $row; 
} 



$conn->close();



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Product</h1>


		<?php if($fruit): ?>

		<p>
		Name: <?php echo $fruit['name']; ?><br>
		Price: <?php echo $fruit['price']; ?><br>
		Qty: <?php echo $fruit['qty']; ?><br>
		Description: <?php echo $fruit['description']; ?><br>


		</p>			

		<?php else: ?>

			<p>No record</p>

		<?php endif ?>



		
	</body>
</html>