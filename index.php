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

    <title>My Blog!</title>
    <style>
      input{
        margin-bottom:20px;
        margin-left:50px;
      }
    </style>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-12 mt-5">
          <ul>
            <li>Home</li>
            <li>Contact</li>
            <li id="signup-trigger" data-toggle="modal" data-target="#signup-modal">Sign up</li>
          </ul>
         
        </div>
        <div class="col-12">
          
          <div class="response_msg"></div>
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