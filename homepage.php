<!-- Devan McCallum -->
<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" />
    <!--<link rel="stylesheet" href="style.css">-->

    <title>Sign-Up/Login Form </title>
    <?php include 'css/css.html'; ?>
  </head>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      if (isset($_POST['login'])) { //user logging in

          require 'login.php';

      }

      elseif (isset($_POST['register'])) { //user registering

          require 'register.php';

      }
  }
  ?>

  <body>

    <!-- insert your code here -->
  <div class="container">
  	<div class="row h-100">
	  	<div class="col-md-5">


          <img class="img-fluid" alt="Responsive image" src="feel.png"  />
      </div>
      <div class="col-md-7">
          <p>
          <?php
          if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
              echo $_SESSION['message'];

          endif;
          ?>
          </p>

            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link" href="#signup" role="tab" data-toggle="tab">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#login" role="tab" data-toggle="tab">Log In</a>
              </li>
            </ul>

            <!--*** TABBED CONTENT *** -->
            <div class = "tab-content">

            <!--*** LOGIN PANEL *** -->
            <div role="tabpanel" class="tab-pane fade in active" id = "login">

                <h1>Welcome Back!</h1>
            <form action="homepage.php" method= "post" autocomplete="off">

            <div class="form-group">
              <label class = "sr-only" for="email" >
                Email address<span class="req">*</span>
              </label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" />
            </div>

            <div class="form-group">
              <label class = "sr-only" for="password">
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" />
            </div>

            <button type="submit" name="login" class="btn btn-info">
              Login
            </button>

          </form>
		  </div>

      <!--*** SIGN-UP PANEL *** -->
      <div role="tabpanel" class="tab-pane fade in active" id="signup">
        <h1>Sign Up for Free</h1>

        <form action="homepage.php" method="post" autocomplete="off">

        <div class = "form-group">
          <label class = "sr-only" for = "firstname">
            First Name<span class ="req">*</span>
          </label>
          <input type = "text" name = "firstname" class = "form-control"
                 id = "firstname" placeholder = "First Name"/>
        </div>

        <div class = "form-group">
          <label class = "sr-only" for = "lastname">
             Last Name<span class ="req">*</span>
          </label>
          <input type = "text" name = "lastname" class = "form-control"
                  id = "lastname" placeholder = "Last Name"/>
        </div>

        <div class = "form-group">
          <label class = "sr-only" for = "email">
             Email Address<span class ="req">*</span>
          </label>
          <input type = "email" name = "email" class = "form-control"
                  id = "email" placeholder = "Email"/>
       </div>

        <div class = "form-group">
          <label class = "sr-only" for = "password">
             New Password<span class ="req">*</span>
          </label>
          <input type = "password" name = "password" class = "form-control"
                  id = "password" placeholder = "Password"/>
        </div>

        <button type="submit" name ="register" class = "btn btn-info">
          Register
        </button>

      </form>




	  </div>
  </div>
</div>
</div>
</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>
</html>
