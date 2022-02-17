<?php

//compare value
$num1 = 3;
$num2 = 3;

if($num1 == $num2){
	echo "{$num1} and {$num2} are same";
}
echo "<br>";

//compare value and data type
$num1 = 9;
$num2 = 9;

if($num1 === $num2){
	echo "{$num1} and {$num2} are same";
}

echo "<br>";
//greater than
//exclusive
$num1 = 9;
$num2 = 8;
if($num1 > $num2){
	echo "{$num1} is greater than {$num2}";
}


echo "<br>";
//greater than and equal to
//inclusive
$num1 = 9;
$num2 = 9;
if($num1 >= $num2){
	echo "{$num1} is greater than and equal to {$num2}";
}

echo "<br>";
//compare value
$num1 = 3;
$num2 = 4;

if($num1 != $num2){
	echo "{$num1} and {$num2} are not same";
}
echo "<br>";