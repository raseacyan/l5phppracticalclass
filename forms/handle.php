<?php

if(isset($_GET['enter'])){
	$number = $_GET['number'];
	if($number % 2 == 0){
		echo "You have entered even number";
	}else{
		echo "You have entered odd number";
	}	
}


if(isset($_POST['enter'])){
	$number = $_POST['number'];
	if($number % 2 == 0){
		echo "You have entered even number";
	}else{
		echo "You have entered odd number";
	}	
}
/*
if(isset($_REQUEST['enter'])){
	$number = $_REQUEST['number'];
	if($number % 2 == 0){
		echo "You have entered even number";
	}else{
		echo "You have entered odd number";
	}	
}*/



