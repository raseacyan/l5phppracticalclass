<?php

//khin nyein chan soltuion

/*
    $word = "level";
    $word_count = strlen($word);   
    $char_arr = str_split($word,1);
    $rev_char_arr = str_split(strrev($word),1);
    $count = 0;
    for($i= 0; $i< $word_count;$i++){
       if($char_arr[$i] == $rev_char_arr[$i]){
           $count += 1;
       }else{
        echo "{$word} isn't a palindrome.";
        break;
       }
       if($count == $word_count){
           echo "{$word} is a palindrome.";
       }
        
    }

*/

// su sander solution

/*
$test="leval";
$check="";
for($i = 4; $i>=0; $i--){
	$check.=$test[$i];
	}
//echo "$check"	;
if ($test==$check){
	echo "$test is a palindrome.";
}
else{
	echo "$test is not a palindrome.";
}*/

//khant win htet

/*
for ($test="LEVEL"; $test[0]>=$test[4]; $test++){
	echo "In LEVEL the same letter is $test[0]";
}
echo"<br>";

for($test="LEVEL"; $test[0]>=$test[4]; $test++){
		echo "In LEVEL the same letter is $test[1]";
}
*/

//my soution

$word = "level";
$loop = (strlen($word) % 2 == 0)? strlen($word) / 2 : (strlen($word) - 1) / 2 ;
$isPalindrome = true;
for($i = 0; $i< $loop; $i++){
	if($word[$i] != $word[strlen($word) - $i - 1]){
		$isPalindrome = false;
		break;		
	}

}

echo ($isPalindrome)?"{$word} is palindrome":"{$word} is  not palindrome";