<!-- THIS ISN'T WORKING RIGHT NOW I WANT IT TO RETURN YOU TO HOMEPAGE WITH A LOGGED
OFF MESSSAGE -->



<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();

$_SESSION['message'] = "Logged Off!";
header("location: homepage.php");
