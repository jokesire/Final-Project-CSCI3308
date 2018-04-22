<!-- I WANT THIS TO EVENTUALLLY DISPLAY A USER PROFILE WITH THE PROFILESETUP.PHP
INFORMATION USING HTML BOOTSTRAP 4 FOR FORMATTING -->

<?php
/* I want this to be the place where a new database is made
containing more personalized information, avatars and connnections */
session_start();

// Check if user is logged in
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Login before viewing profile!";
  header("location: homepage.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"crossorigin="anonymous">
  <link rel="stylesheet" href="main.css" />

  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class ="container">
    <div class="row">
      <div class="col-md-5">


          <img class="img-fluid" alt="Responsive image" src="feel.png"  />
      </div>
      <div class= "col-md-3">
          <img class="img-profile" alt="ProfilePicture" src="profile.png"  />
      </div>
      <div class="col-md-4">

          <h1><?php echo $first_name.' '.$last_name; ?></h1>
          <p><?= $email ?></p>
          <h4>instagram</h4>
          <h4>colledge</h4>
          <h4>grade</h4>

          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

      </div>
    </div>
    <div class= "row 3">
      <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link" href="#mymatches" role="tab" data-toggle="tab">My Matches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#findnewmatches" role="tab" data-toggle="tab">Find New Matches</a>
              </li>
            </ul>

            <!--*** TABBED CONTENT *** -->
            <div class = "tab-content">

            <!--*** LOGIN PANEL *** -->
            <div role="tabpanel" class="tab-pane fade in active" id = "mymatches">
            <form action="homepage.php" method= "post" autocomplete="off">

            <div class="form-group">
              <label class = "sr-only" for="email" >
                Email address<span class="req">*</span>
              </label>
              <input type="email" name="email" class="form-control" id="email" placeholder="email" />
            </div>

            <div class="form-group">
              <label class = "sr-only" for="password">
                Password<span class="req">*</span>
              </label>
              <input type="password" name="password" class="form-control" id="password" placeholder="password" />
            </div>

            <button type="submit" name="login" class="btn btn-info">
              Login
            </button>

          </form>
      </div>

      <!--*** SIGN-UP PANEL *** -->
      <div role="tabpanel" class="tab-pane fade in active" id="findnewmatches">
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
</body>
</html>
