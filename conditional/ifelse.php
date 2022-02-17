<?php

$num1 = 9;
$num2 = 8;

if($num1 > $num2){
	echo "it is true";
}else{
	echo "it is false";
}

echo "<br>outside if else<br>";

//short form

$result =  ($num1 > $num2)? "it is true" : "it is false";
echo $result;