<?php

include "config.php";
session_start();

// $name = $_POST["add_post_form"];
if (isset($_POST["add_post_form"]) && !empty($_POST["add_post_form"])) {

	$post_title = mysqli_real_escape_string($link, $_POST["post_title"]);
	$post_cat = mysqli_real_escape_string($link, $_POST["post_cat"]);
	$post_article = mysqli_real_escape_string($link, $_POST["post_article"]);
	$post_image = mysqli_real_escape_string($link, $_POST["post_image"]);
	$author_id = $_SESSION["USER_ID"];

	$query = "INSERT INTO `articles`(`Post`,`Author_id`, `Post_title`, `Post_img`, `Ctg`) VALUES ('$post_article',$author_id,'$post_title','$post_image','$post_cat')";

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
				$_SESSION["USER_ID"] = $row["id"];
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

if (isset($_POST["search_user_form"]) && !empty($_POST["search_user_form"])) {
	
	$user_name = mysqli_real_escape_string($link, $_POST["uname"]);
	$user_email = mysqli_real_escape_string($link, $_POST["uemail"]);
	$user_phone = mysqli_real_escape_string($link, $_POST["uphone"]);
 
	$name_query = "SELECT * FROM USERS JOIN roles ON roles.id = users.Role WHERE Name LIKE '%$user_name%'";
	$result = mysqli_query($link,$name_query);
	if(!mysqli_num_rows($result)){

		$all_results = array('status'=>'No user found!');
	}
	else{
			$all_results = array('status'=>'User found');
			while($row = mysqli_fetch_assoc($result)){
			array_push($all_results,$row);
		}
		
	}
		echo json_encode($all_results);
	} 

if (isset($_POST["page"]) && !empty($_POST["page"])) {
					
		$current_page = mysqli_real_escape_string($link, $_POST["page"]);
		$math = (int)$current_page*3 - 3;

		$page_query = "SELECT * FROM articles JOIN users ON users.id=articles.Author_id LIMIT $math,3";
		$result = mysqli_query($link,$page_query);

		if(!mysqli_num_rows($result)){
			$response = array('status'=>'fail');
		}
		else{
			$response=array('status'=>'success');
			while($row = mysqli_fetch_assoc($result)){
				array_push($response,$row);
			}

		}
	


		// $response = array('page'=>$current_page,'QUERY'=>$page_query);
		echo json_encode($response);

}

?>