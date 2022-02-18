<?php
$num = 5;
while($num > 0){
	$monkey = ($num > 1)? "monkeys": "monkey";
	echo "{$num} little {$monkey}, jumping on the bed<br>";
	$num--;
}


echo "no more monkeys, jumping on the bed";