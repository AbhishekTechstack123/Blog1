<?php

include "config.php";
session_start();
// $name = $_POST["add_post_form"];
if (isset($_POST["add_post_form"]) && !empty($_POST["add_post_form"])) {

	$post_title = mysqli_real_escape_string($link, $_POST["post_title"]);
	$post_cat = mysqli_real_escape_string($link, $_POST["post_cat"]);
	$post_article = mysqli_real_escape_string($link, $_POST["post_article"]);
	$post_image = mysqli_real_escape_string($link, $_POST["post_image"]);

	$query = "INSERT INTO `articles`(`Post`,`Author_id`, `Post_title`, `Post_img`, `Ctg`) VALUES ('$post_article',11,'$post_title','$post_image','$post_cat')";

	if(!mysqli_query($link,$query)){
	  echo("Error description: " . mysqli_error($link));
	}
} 

if (isset($_POST["login-form-submit"]) && !empty($_POST["login-form-submit"])) {

	$loginuser = mysqli_real_escape_string($link, $_POST["loginusername"]);
	$loginpass = mysqli_real_escape_string($link, $_POST["loginpass"]);

	$query1 = "SELECT * FROM users WHERE Email = '$loginuser' OR phone = '$loginuser'";

	$result = mysqli_query($link,$query1);
	if($result){
		$row = mysqli_fetch_assoc($result);
		$userid = $row["id"];
		$user_display_name = $row["Name"];

		$query2 = "SELECT * FROM user_auth WHERE U_id = $userid";
		$result2 = mysqli_query($link,$query2);

		if($result2){
			$row2 = mysqli_fetch_assoc($result2);
			$stored_pass = $row2["Pwd"];
			if(md5($loginpass) === $stored_pass){
				//successful login
				$_SESSION["USER_NAME"] = $user_display_name;
				$_SESSION["USER_ROLE"] = $row["Role"];
			}
			else{
				echo "Failure";
			}
		}
	}

}


if (isset($_POST["updatepostform"]) && !empty($_POST["updatepostform"])) {


	$newpost = mysqli_real_escape_string($link, $_POST["newpost"]);
	$articleid = mysqli_real_escape_string($link, $_POST["articleid"]);

	$changepostquery = "UPDATE articles SET Post = '$newpost' WHERE article_id = $articleid";
	if(mysqli_query($link,$changepostquery)){
		echo "Article changed successfully!";
	}
	else{
		echo $changepostquery;
		echo("Error description: " . mysqli_error($link));

	}

}

?>