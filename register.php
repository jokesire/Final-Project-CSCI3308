<?php
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
//http://php.net/manual/en/mysqli.construct.php
//http://php.net/manual/en/mysqli.real-escape-string.php
$first_name = $mysqli->real_escape_string($_POST['firstname']);
$last_name = $mysqli->real_escape_string($_POST['lastname']);
$email = $mysqli->real_escape_string($_POST['email']);
$password = $mysqli->real_escape_string($_POST['password']);


// Check if user with that email already exists
//http://php.net/manual/en/mysqli.query.php
$result = $mysqli->query("SELECT * FROM logininfo WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'User with this email already exists!';
    header("location: homepage.php");

}
else { // Email doesn't already exist in a database, proceed...


    $sql = "INSERT INTO logininfo (first_name, last_name, email, password) "
            . "VALUES ('$first_name','$last_name','$email','$password')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['logged_in'] = true; // So we know the user has logged in

        header("location: profilesetup.php");

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: homepage.php");
    }

}
