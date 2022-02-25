<?php

$cart = array();

$product1 = array(
	"id" => 1,
	"name"=>'LV bag',
	"price" => 300000,
	"qty" => 2);

$product2 = array(
	"id" => 2,
	"name"=>"Coach bag",
	"price" => 200000,
	"qty"=>1
);

array_push($cart, $product1);
array_push($cart, $product2);

echo "<pre>";
print_r($cart);
echo "</pre>";

/*
foreach($cart as $item){
	echo "Product name: {$item['name']}, Price: {$item['price']}, Qty: {$item['qty']}";
	echo "<br>";
}

echo "cart total is 800000";*/

$cart_total = 0;
foreach($cart as $item){
	echo "Product name: {$item['name']}, Price: {$item['price']}, Qty: {$item['qty']}";
	echo "<br>";
	$item_total =$item['qty']*$item['price'];
	$cart_total += $item_total;
}

echo "cart total is {$cart_total}";