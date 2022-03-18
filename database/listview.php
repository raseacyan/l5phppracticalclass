<?php
include('connect.php');
include('functions.php');

$fruits = getProducts($conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sample</title>
	</head>
	<body>
		<h1>Product List</h1>

		<p><a href="create.php">Add Product</a></p>


		<?php if($fruits): ?>

			<table cellspacing="10" cellpadding="10">
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Description</th>
					<th>Category</th>
					<th>Action</th>
					
				</tr>

				<?php foreach($fruits as $fruit): ?>
				<tr>
					<td><a href="singleview.php?id=<?php echo $fruit['id']; ?>"><?php echo $fruit['name']; ?></a></td>
					<td><?php echo $fruit['price']; ?></td>
					<td><?php echo $fruit['qty']; ?></td>
					<td><?php echo $fruit['description']; ?></td>
					<td><?php echo $fruit['category_name']; ?></td>
					<td>
						<a href="update.php?id=<?php echo $fruit['id'] ?>">Update</a> |
						<a href="delete.php?id=<?php echo $fruit['id']; ?>">Delete</a>
					</td>
					
				</tr>
				<?php endforeach; ?>

			</table>

		<?php else: ?>

			<p>There are no fruits</p>

		<?php endif ?>



		
	</body>
</html>
<?php $conn->close(); ?>