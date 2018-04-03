<?php
/* checks if user exists and password is correct */

// Escape email for security
$email = $mysqli->real_escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User is not associated with that email! Please Try Again!";
    header("location: homepage.php");
}
else { //  exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];

        // logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "Password you entered is incorrect! Please Try Again.";
        header("location: homepage.php");
    }
}
