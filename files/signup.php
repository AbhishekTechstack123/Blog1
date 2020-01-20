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
// if(){
// 	$pass_query = ""
// }
echo "signup successful";

?>