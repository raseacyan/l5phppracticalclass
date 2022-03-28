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
	  //$last_id = $conn->insert_id;
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}

function updateRecord($table, $data, $id, $conn){

	$set = "";
	foreach($data as $k=>$v){
		$set .= "`".$k."`='".$v."',";
	}
	$set = substr($set, 0,-1);


	$sql = "UPDATE {$table} set {$set} WHERE id={$id}";
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}
}

function deleteRecord($table, $id, $conn){
	$sql = "DELETE FROM {$table} WHERE id={$id}";	
	$result = $conn->query($sql);

	if ($result) {
	  return true;
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;die();
	  return false;
	}	
}


function redirectTo($url){
	header("Location:".$url);
}

/******************
@check user
*******************/

function checkUser($username, $password, $conn){	
	$sql = "SELECT * FROM users WHERE username='{$username}' AND password = '{$password}'";

	$result = $conn->query($sql);
	
	$data = array();
	if ($result->num_rows > 0) { 
	   $row = $result->fetch_assoc();
	   $data = $row; 
	   return $data;
	} 

	return false;	
}

function adminRedirectIfNotLogin(){
	if(!isset($_SESSION['username']) && $_SESSION['role'] !== 'admin'){
	redirectTo('login.php');
	}
}