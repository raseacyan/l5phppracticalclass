<?php

include('connect.php');

$id = isset($_REQUEST['id'])? $_REQUEST['id']: 0;

// sql to delete a record
$sql = "DELETE FROM products WHERE id={$id}";

if ($conn->query($sql) === TRUE) {
  header('Location:listview.php');
} else {
  echo "Error deleting record: " . $conn->error;
}