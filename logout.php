<?php
if(!isset($_SESSION)) 
    {
    	session_start();
    	ob_start(); 
    }
session_unset();
session_destroy();
header("location: homepage.php");
exit();
?>
<!-- Log out process, unsets and destroys session variables -->
