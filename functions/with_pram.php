<?php

//function withparameters

//function definition
function Display($name){
	echo "Hello. My name is {$name}. How are you!.<br>";
}


Display("Effy");
Display("Emily");


function Display2($name, $email){
	echo "Hello. My name is {$name}. My email is {$email}.<br>";
}


Display2("Effy", "effy@test.com");
$name = "Emily";
$email = "email@test.com";
Display2($name, $email);
