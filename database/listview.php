<?php
include('connect.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$fruits = array();
if ($result->num_rows > 0) { 
  while($row = $result->fetch_assoc()) {
    array_push($fruits, $row);
  }
} 



$conn->close();



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Product List</h1>


		<?php if($fruits): ?>

			<table cellspacing="10" cellpadding="10">
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Description</th>
					
				</tr>

				<?php foreach($fruits as $fruit): ?>
				<tr>
					<td><a href="singleview.php?id=<?php echo $fruit['id']; ?>"><?php echo $fruit['name']; ?></a></td>
					<td><?php echo $fruit['price']; ?></td>
					<td><?php echo $fruit['qty']; ?></td>
					<td><?php echo $fruit['description']; ?></td>
					
				</tr>
				<?php endforeach; ?>

			</table>

		<?php else: ?>

			<p>There are no fruits</p>

		<?php endif ?>



		
	</body>
</html>