<?php 


include "files/config.php";
include "header.php";
session_start();

if(isset($_SESSION["USER_ROLE"]) && isset($_SESSION["USER_NAME"])){
  if($_SESSION["USER_ROLE"] != 1){
    header("Location: index.php");
  }

}

$allposts = "SELECT * FROM articles JOIN users ON articles.Author_id = users.id";

	


 ?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>My Blog!</title>
  </head>
  <body>	
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php echo $header; ?>
			</div>
		</div>
		<br><hr>
		<div class="row">
				
				<button>Modify existing posts</button>
				<button>Change roles</button>
				<button>Moderate comments</button>

		</div>
	</div>
  			<br><hr>
	<ul>
		
		<li>Modify/delete a post</li>
		<li>Change role</li>
		<li>Delete comments</li>

	</ul>
	

	<div class="row">
		
			<div class="col-12 col-sm-8 offset-sm-2">
					<table border="solid" class="modifyposttable" width="800" cellpadding="15">
							<thead>
								<th>Title</th>
								<th>Date</th>
								<th>Author</th>
								<th>Category</th>
								<th>Action</th>
							</thead>
							<tbody>
				<?php 
					$result = mysqli_query($link,$allposts);
					while($row = mysqli_fetch_assoc($result)){

						echo '
								<tr>
								<td>'.$row["Post_title"].'</td>
								<td>'.$row["Created_at"].'</td>
								<td>'.$row["Name"].'</td>
								<td>'.$row["Ctg"].'</td>
								<td><button class="btn btn-secondary modify-post" post-id="post'.$row["article_id"].'">Modify</button></td>
								</tr>
								<tr style="display:none;" id="post'.$row["article_id"].'">
									
									<form class="updatepost"  method="POST">
										<td colspan=4>
										<textarea name="newpost" rows="10" cols="80">'.$row["Post"].'</textarea>
										</td>
										<td>
										<input name="articleid" type="hidden" value="'.$row["article_id"].'">
										<input name="updatepostform" value=1 type="hidden">
										<input type="submit" value="Save Changes">
										</td>
									</form>
								</tr>							
						';

						}

				 ?>
				 	 </tbody>
					 </table>
			</div>
	</div>

  	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

  </body>
  </html>