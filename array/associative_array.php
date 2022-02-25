<?php

//index array
$person1 = array("effy", "stonem", 18, "effy@skins.co.uk");
echo "<pre>";
print_r($person1);
echo "</pre>";
$person2 = array("kaite", "fitch", 18, "kaite@skins.co.uk");
echo "{$person1[0]} {$person1[1]} is {$person1[2]} years old and email is {$person1[3]}";
echo "<br>";
echo "{$person2[0]} {$person2[1]} is {$person2[2]} years old and email is {$person2[3]}";

echo "<br><br>";



//associative array (key => value)

$person1 = array(
	"first"=>"effy", 
	"last"=>"stonem", 
	"age" => 18, 
	"email" => "effy@skins.co.uk"
);
echo "<pre>";
print_r($person1);
echo "</pre>";
$person2 = array("first"=>"katie", "last"=>"fitch", "age" => 18, "email" => "kaite@skins.co.uk");


echo "{$person1["first"]} {$person1["last"]} is {$person1["age"]} years old and email is {$person1["email"]}";
echo "<br>";
echo "{$person2["first"]} {$person2["last"]} is {$person2["age"]} years old and email is {$person2["email"]}";