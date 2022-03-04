<?php

function multiply($num1, $num2){
	$result = $num1 * $num2;
	return $result;
}

$num1 = 4;
$num2 = 5;
$result =  multiply($num1,$num2);
echo "{$num1} times {$num2} is {$result}";