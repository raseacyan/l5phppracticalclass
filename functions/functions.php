<?php


function isItEven($num1){
	if($num1%2 == 0){
		return TRUE;
	}else{
		return FALSE;
	}
}

function display($array){
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

