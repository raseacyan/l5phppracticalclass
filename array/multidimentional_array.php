<?php

$person1 = array(
	"first"=>"effy", 
	"last"=>"stonem", 
	"age" => 18, 
	"email" => "effy@skins.co.uk"
);

$person2 = array("first"=>"katie", "last"=>"fitch", "age" => 18, "email" => "kaite@skins.co.uk");

$person3 = array("first"=>"emily", "last"=>"fitch", "age" => 18, "email" => "kaite@skins.co.uk");

$casts = array($person1, $person2, $person3);
/*
$casts = array(
	array(
	"first"=>"effy", 
	"last"=>"stonem", 
	"age" => 18, 
	"email" => "effy@skins.co.uk"
	), 
	array("first"=>"katie", "last"=>"fitch", "age" => 18, "email" => "kaite@skins.co.uk"), 
	array("first"=>"emily", "last"=>"fitch", "age" => 18, "email" => "kaite@skins.co.uk")
);*/


/*
echo "<pre>";
print_r($person1);
echo "</pre>";

echo "<pre>";
print_r($person2);
echo "</pre>";

echo "<pre>";
print_r($person3);
echo "</pre>";

echo "<pre>";
print_r($casts);
echo "</pre>";*/

echo "Emaily email is {$casts[2]['email']}";

echo "<br>" ;

//echo  "Katie last name is fitch";

$cart = array();

$product1 = array(
	"id" => 1,
	"name"=>"LV bag",
	"price" => 300000,
	"qty" => 1);

$product2 = array(
	"id" => 2,
	"name"=>"Coach bag",
	"price" => 200000,
	"qty"=>1
);

//alternative 1
//$cart = array($product1, $product2);

//alternative 2
/*
$cart[] = $product1;
$cart[] = $product2;
*/

//alternative 3
array_push($cart, $product1);
array_push($cart, $product2);




echo "<pre>";
print_r($cart);
echo "</pre>";

echo $cart[1]['price'];


