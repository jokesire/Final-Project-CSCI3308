<?php
if(!isset($_SESSION)) 
    {
      ob_start();
      session_start(); 
    }
/* I want this to be the place where a new database is made
containing more personalized information, avatars and connnections */
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
                <a class="nav-link" href="mymatches.php" role="tab" data-toggle="tab">My Matches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#findnewmatches" role="tab" data-toggle="tab">Find New Matches</a>
              </li>
            </ul>
            <!--*** TABBED CONTENT *** -->
            <div class = "tab-content" class>

            <!--*** My Matches *** -->
            <!--<div role="tabpanel" class="tab-pane fade in active" id = "mymatches">
            <ul>
              <!*** need array of matches for for loop to create list of matches, and a info panel pop out on click    
            
            for ($i = 1; $i <= count($matcharray); $i++)
              {
                echo '<li class="match-item"> <a class="match-link" href="#match $i" data-toggle="tab">$first_name.' '.$last_name</a>
                    </li>'

                    '<div role="matchinfo" class="tab-pane fade in active" id = "match $i">

                    </div>'
                    ;
              }
            ?>
           
            
        
            </ul>
      </div> 
      -->

      <!--*** Find New Matches Panel *** -->

            <div role="tabpanel" class="col-md-6" class="tab-pane fade in active" id="findnewmatches">
            <h1>Their Information</h1>
            <form action="profile.php" method="post" autocomplete="off">

            Name:<br>
            <input type="text" name="tname" placeholder="Name">
            <br>
            Nickname:<br>
            <input type="text" name="tnickname" placeholder="Nickname">
            <br>
            Major:<br>
            <input type="text" name="tmajor" placeholder="Major">
            <br>
            Location<br>
            <select name="tlocationone">
            <option value="tparty">Party</option>
            <option value="tclass">Class</option>
            <option value="tother">Other</option>
            </select>
            <br>
            Where (What class, restaurant, party ect.):<br>

            <input type="text" name="tlocationtwo" >
            <br>
            Where (Misc Info):<br>
            <input type="text" name="tlocationthree" >
            <br>

            Day Met (mm-dd-yy):<br>
            <input type="text" name="tdate" >
            <br>

            Phone (###-###-####):<br>
            <input type="text" name="tphone" >
            <br>
            <input type="submit" value="Submit">
            <br>
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
