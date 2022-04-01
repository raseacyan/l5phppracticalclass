<?php
session_start();
include('../inc/functions.php');
if(!isAdminLogin()){
	redirectTo("login.php");
}
?>

this is private page for admin. you need to log in