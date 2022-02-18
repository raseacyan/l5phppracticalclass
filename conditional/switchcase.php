<?php

$month = 3;

/*
if($month == 1){
	echo "January";
}elseif($month == 2){
	echo "February";
}elseif($month == 3){
	echo "March";
}elseif($month == 4){
	echo "April";
}elseif($month == 5){
	echo "May";
}elseif($month == 6){
	echo "June";
}elseif($month == 7){
	echo "July";
}elseif($month == 8){
	echo "August";
}elseif($month == 9){
	echo "Sepetember";
}elseif($month == 10){
	echo "October";
}elseif($month == 11){
	echo "November";
}elseif($month == 12){
	echo "December";
}else{
	echo "not a valid month";
}*/

switch ($month){
	case 1:
		echo "January";
		break;
	case 2:
		echo "February";
		break;
	case 3:
		echo "March";
		break;
	case 4:
		echo "April";
		break;
	case 5:
		echo "May";
		break;
	case 6:
		echo "June";
		break;
	case 7:
		echo "July";
		break;
	case 8:
		echo "August";
		break;
	case 9:
		echo "Sepetember";
		break;
	case 10:
		echo "October";
		break;
	case 11:
		echo "November";
		break;
	case 12:
		echo "December";
		break;
	default: 
		echo "Not a valid month";
		break;
}

switch ($month){
	case 1:
	case 2:
	case 12:
		echo "Winter";
		break;
	case 3:
	case 4:
	case 5:
		echo "Spring";
		break;
	case 6:
	case 7:
	case 8:
		echo "Summer";
		break;
	case 9:
	case 10:
	case 11:
		echo "Autumn";
		break;	
	default: 
		echo "Not a valid month";
		break;
}

if($month == 1 || $month == 2 || $month == 12){
	echo "Winter";
}elseif($month == 3 || $month == 4 || $month == 5){
	echo "Spring";
}elseif($month == 6 || $month == 7 || $month == 8){
	echo "Summber";
}elseif($month == 9 || $month == 10 || $month == 11){
	echo "Autumn";
}else{
	echo "not a valid month";
}