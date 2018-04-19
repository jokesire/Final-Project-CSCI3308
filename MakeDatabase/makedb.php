<?php

//connection variables
$host = 'localhost';
$user = 'root';
//Just comment out my password if you want to test on you machine
//So we don't have
$password = 'Qn9tvCerg4xxfqpn'; //DEVANS LOCAL PW


//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//create the database
if ( !$mysqli->query('CREATE SCHEMA BoulderConnects') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

//create users table with all the fields
$mysqli->query('
CREATE TABLE `BoulderConnects`.`LoginInfo`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(50) NOT NULL,
     `last_name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,


PRIMARY KEY (`id`)
);


') or die($mysqli->error);

?>
