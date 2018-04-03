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
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>

          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
</body>
</html>
