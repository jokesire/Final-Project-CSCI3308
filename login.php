<?php
$email = $mysqli->real_escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM logininfo WHERE email='$email'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User is not associated with that email! Please Try Again!";
    header("location: homepage.php");
}
else {
    $user = $result->fetch_assoc();

    if ($_POST['password']==$user['password'] ) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['logged_in'] = true;
        header("location: profile.php");

    }
    else {
        $_SESSION['message'] = "Password you entered is incorrect! Please Try Again.";
        header("location: homepage.php");
    }
}
?>