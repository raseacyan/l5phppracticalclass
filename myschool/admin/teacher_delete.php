<?php
include('../inc/functions.php');
include('../inc/connection.php');

$id = isset($_REQUEST['id'])? $_REQUEST['id']: 0;

$table = "teachers";


if(deleteRecord($table, $id, $conn)){
	redirectTo("teacher_list.php");
}else{
	echo "Error deleting record: " . $conn->error;
}

