<?php

/*
creating variables
Assign values to variables
data types
-- String
-- Number
-- Boolean
-- Array
-- Object
-- NULL
-- Resource
*/

/*****************
String
*****************/
$name = 'Effy Stonem'; 
echo $name;

echo "<br>";

/*****************
Number 
*****************/
$number = 9;
echo $number;


echo "<br>";

/*****************
Boolean
*****************/

$boolean = FALSE;
var_dump($boolean);

echo "<br>";

/*****************
Array
*****************/

$array = array('apple', 'banana', 'orange');
print_r($array);

echo "<br>";

/*****************
Object
*****************/

class User{
	public $name = "Emily Fitch"; 
}

$person = new User;
echo $person->name;

echo "<br>";

/*****************
Null
*****************/

$empty = NULL;
var_dump($empty);

echo "<br>";

echo "Hello PHP";

//print value from variable
echo "<br>";
$first_name = "Elizabeth";
echo $first_name;

//print value from multiple variables
echo "<br>";
$first_name = "Elizabeth";
$last_name = "Stonem";
$age = 18;
echo "Hello! My name is ".$first_name. " " .$last_name.". I am ".$age. " years old.";

echo "<br>";
echo "Hello! My name is {$first_name} {$last_name}. I am {$age} years old.";



