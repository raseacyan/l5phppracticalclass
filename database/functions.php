<?php

/******************
@Helper Functions
*******************/

function display($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function createRecord($table, $data, $conn){

	$columns = "";
	$values = "";
	foreach($data as $key=>$val){
		$columns .= "{$key},";
		$values .= "'{$val}',";
	}
	$columns = substr($columns, 0,-1);
	$values = substr($values, 0,-1);



	$sql = "INSERT INTO {$table} ({$columns}) 
	VALUES ({$values})";

	if ($conn->query($sql) === TRUE) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

function updateRecord($table, $id, $data, $conn){

}
/******************
@Category
*******************/

function getCategories($conn){	
	$sql = "SELECT * FROM categories";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}

function getCategoryNameById($id, $conn){
	$sql = "SELECT name FROM categories WHERE id={$id}";
	$result = $conn->query($sql);
	
	$data;
	if ($result->num_rows > 0) { 
	  $row = $result->fetch_assoc();
	   $data = $row['name'];	 
	} 

	return $data;	
}


/******************
@Products
*******************/

function getProducts($conn){	
	$sql = "SELECT  products.id, products.name, products.price, products.qty,  products.description, categories.name as category_name FROM products, categories WHERE products.category = categories.id";
	$result = $conn->query($sql);

	$data = array();
	if ($result->num_rows > 0) { 
	  while($row = $result->fetch_assoc()) {
	    array_push($data, $row);
	  }
	} 

	return $data;
}