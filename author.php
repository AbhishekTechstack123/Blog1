<?php

include "files/config.php";


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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="signup-trigger" data-toggle="modal" data-target="#signup-modal">Sign up</a>
                  </li>
                </ul>
              </div>
            </nav>         
        </div>
        <div class="col-12">
            <div class="text-center display-2 mt-2">Add a new article</div>
            <div class="col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3 mt-3">
                  <form id="add_post" action="files/action.php" method="POST">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Post title</label>
                      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="post_title">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Category</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="post_cat">
                        <option value="Travel">Travel</option>
                        <option value="Food">Food</option>
                        <option value="Fashion">Fashion</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Article</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="post_article"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Image</label>
                      <input type="text" class="form-control w-50" id="exampleFormControlInput2" name="post_image">
                    </div>
                    <div class="form-group">
                    <div id="res_msg" class="text-center font-weight-bold"></div>
                    <input type="hidden" name="add_post_form" value=1>
                    <input type="submit" class="form-control w-auto btn btn-primary" id="exampleFormControlInput3" value="Submit">
                    </div>
                    <div class="mb-5"></div>
                  </form>
            </div> <!-- col-12 -->
        </div> <!-- col-12 -->
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
                      <input type="submit">

                    </form>
              </div>
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