<?php

include "config.php";

// $name = $_POST["add_post_form"];

if (isset($_POST["add_post_form"]) && !empty($_POST["add_post_form"])) {

	$post_title = $_POST["post_title"];
	$post_cat = $_POST["post_cat"];
	$post_article = $_POST["post_article"];
	$post_image = $_POST["post_image"];

	$query = "INSERT INTO `articles`(`Post`,`Author_id`, `Post_title`, `Post_img`, `Ctg`) VALUES ('$post_article',11,'$post_title','$post_image','$post_cat')";
} 

mysqli_query($link,$query);

?>