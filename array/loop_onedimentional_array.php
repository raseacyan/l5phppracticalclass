<?php

$fruits = array("apple", "banana", "orange", "pineapple", "strawberry");

echo "<pre>";
print_r($fruits);
echo "</pre>";
//using for loop
for($i = 0; $i < count($fruits); $i++){
	echo $fruits[$i]."<br>";
}

echo "<br>";

//using foreach loop
foreach($fruits as $fruit){
	echo $fruit."<br>";
}

echo "<br>";
//using foreach loop
/*
foreach($fruits as $key=>$val){

	echo $key." ".$val."<br>";
}*/


//associative array
$fruits2 = array("one"=>"apple", "two"=>"banana", "three"=>"orange", "four"=>"pineapple", "five"=>"strawberry");

print_r($fruits2);

foreach($fruits2 as $key=>$fruit){
	echo $key." ".$fruit."<br>";
}