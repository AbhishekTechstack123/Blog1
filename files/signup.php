<?php

include "config.php";

$name = $_POST["fullname"];
$uname = $_POST["uname"];
$email = $_POST["uemail"];
$phone = $_POST["uphone"];
$pass = $_POST["upass"];
$urepass = $_POST["urepass"];


$query = "INSERT INTO `users`(`Name`, `U_Name`, `Role`, `Email`, `phone`) VALUES ('$name', '$uname', 2,'$email', '$phone')";

$result = mysqli_query($link, $query);

//if signup successfull, add auth details
if($result){
	$user_id = mysqli_insert_id($link);
	$query = "INSERT INTO `user_auth`(`U_id`, `Pwd`, `Email_vfy`, `Phone_vfy`) 
	VALUES ($user_id,'".md5($pass)."',0,0)";
	// echo $query;
	mysqli_query($link, $query);
	echo "Account successfully created";
}

?>