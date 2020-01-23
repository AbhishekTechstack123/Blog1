<?php

include "files/config.php";
session_start();
$article_query = "SELECT * FROM `articles` JOIN users ON articles. Author_id = users.id";

if(isset($_SESSION["USER_NAME"]) && !empty($_SESSION["USER_NAME"])){
  $login_status = true;
  $display_name = "Hello ".$_SESSION["USER_NAME"]."!";
}
else{
  $login_status = false;
}

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

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">My Blog</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                  </li>
                  <?php
                  if($login_status){
                     echo '<li class="nav-item">
                                <a class="nav-link logout-trigger" href="files/logout.php"> 
                                Logout'." ".$display_name.'</a>
                            </li>';

                  }else{
                   echo ' <li class="nav-item">
                            <a class="nav-link" id="signup-trigger" data-toggle="modal" data-target="#signup-modal">
                             Sign up
                            </a>
                          </li>';
                  }
                  ?>
                </ul>
              </div>
            </nav>         
        </div>
        <div class="col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3 mt-3 mb-3">
          
              <h1 class="display-4 text-center">All articles</h1>
              <?php

                $result = mysqli_query($link, $article_query);
                while($row = mysqli_fetch_assoc($result)){
                  echo '<div class="article_summary">
                      <h1>'.$row["Post_title"].'</h1>
                      <p>Date: '.$row["Created_at"].'</p>
                      <p>Category: '.$row["Ctg"].'</p>
                      <p>Author: '.$row["Name"].'</p>
                      <p class="mt-3">
                        '.$row["Post"].'
                      </p>
                    </div> <!-- article_summary -->';

                      }
              ?>              
        </div>
      </div> <!--row-->

      <div class="row">
        <div id="signup-modal" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="signup_container">
                   <form id="signup-form" action="files/signup.php" method="POST">
            
                      <input type="text" placeholder="Name" name="fullname">
                      <br>
                      <input type="text" placeholder="User Name" name="uname">
                      <br>
                      <input type="text" placeholder="Email" name="uemail">
                      <br>
                      <input type="text" placeholder="Phone" name="uphone">
                      <br>
                      <input type="text" placeholder="Password" name="upass">
                      <br>
                      <input type="text" placeholder="Confirm Password" name="urepass">
                      <br>
                      <div class="signup-msg text-danger font-weight-bold"></div>
                      <input type="submit" value="Sign Up">
                      <br>
                      <div>Already a user? <span class="sign-text">sign-in</span> instead!</div>

                    </form>
                </div> <!-- signup_container -->   
                <div class="login_container">
                    <form id="login-form" action="files/action.php" method="POST">
                      <input type="text" placeholder="Email/Phone" class="mb-3" name="loginusername">
                      <br>
                      <input type="text" class="mb-3" name="loginpass">
                      <br>
                      <input type="hidden" name="login-form-submit" value=1>
                      <input type="submit" class="btn btn-submit">
                      <br>
                      <div>New user? <span class="sign-text">sign-up</span> instead!</div>
                    </form>


                  
                </div>    <!-- login_container -->
              </div> <!--modal-body-->
            </div>
          </div>
        </div>
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