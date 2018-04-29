<?php
$_SESSION['email'] = $_POST['email'];
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['eventname'] = $_POST['eventname'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['eventtype'] = $_POST['eventtype'];
$_SESSION['locationdescription'] = $_POST['locationdescription'];
$_SESSION['additionalinfo'] = $_POST['additionalinfo'];
$_SESSION['nickname'] = $_POST['nickname'];
$_SESSION['hat'] = $_POST['hat'];
$_SESSION['glasses'] = $_POST['glasses'];
$_SESSION['hair'] = $_POST['hair'];
$_SESSION['haircolor'] = $_POST['haircolor'];
$_SESSION['shirt'] = $_POST['shirt'];
$_SESSION['shirtcolor'] = $_POST['shirtcolor'];


/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page


// Escape all $_POST variables to protect against SQL injections
//http://php.net/manual/en/mysqli.construct.php
//http://php.net/manual/en/mysqli.real-escape-string.php
$firstname = $mysqli->real_escape_string($_POST['firstname']);
$lastname = $mysqli->real_escape_string($_POST['lastname']);
$email = $mysqli->real_escape_string($_POST['email']);
$eventname = $mysqli->real_escape_string($_POST['eventname']);
$date = $mysqli->real_escape_string($_POST['date']) ;
$eventtype =  $mysqli->real_escape_string($_POST['eventtype']);
$locationdescription =  $mysqli->real_escape_string( $_POST['locationdescription']);
$additionalinfo =  $mysqli->real_escape_string($_POST['additionalinfo']);
$nickname =  $mysqli->real_escape_string( $_POST['nickname']);
$hat =  $mysqli->real_escape_string($_POST['hat']);
$glasses =  $mysqli->real_escape_string($_POST['glasses']);
$hair =  $mysqli->real_escape_string($_POST['hair']);
$haircolor =  $mysqli->real_escape_string($_POST['haircolor']);
$shirt =  $mysqli->real_escape_string($_POST['shirt']);
$shirtcolor =  $mysqli->real_escape_string($_POST['shirtcolor']);




// Check if user with that email already exists
//http://php.net/manual/en/mysqli.query.php

    $sql = "INSERT INTO myevents (first_name, last_name, email, eventname, date, eventtype, locationdescription,additionalinfo ,nickname, hat, glasses,hair,haircolor, shirt, shirtcolor) "
            . "VALUES ('$firstname', '$lastname', '$email', '$eventname', '$date', '$eventtype', '$locationdescription','$additionalinfo','$nickname', '$hat', '$glasses','$hair','$haircolor', '$shirt', '$shirtcolor')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        $_SESSION['message'] = "Event Added";
        header("location: profile.php");
    }

    else {
        $_SESSION['message'] = 'Add Event Failed!';
        header("location: profile.php");
    }
