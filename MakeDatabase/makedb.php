<?php

//connection variables
$host = 'localhost';
$user = 'root';
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

CREATE TABLE `BoulderConnects`.`SelfInformation`
(
    `email` VARCHAR(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `nickname` VARCHAR(50) NOT NULL,
    `major` VARCHAR(50) NOT NULL,
    `locationtype` VARCHAR(100) ,
    `locationdetail1` VARCHAR(100),
    `locationdetail2` VARCHAR(100),
    `daymet` DATE ,
    `phonenumber` VARCHAR(50) NOT NULL,
    `snapchatid` VARCHAR(50) NOT NULL,
    `clothingcolor(s)` VARCHAR(200),
    `id` INT NOT NULL,

PRIMARY KEY (`id`)
);

CREATE TABLE `BoulderConnects`.`SearchingFor` (
  `name` VARCHAR(50),
  `nickname` VARCHAR(50),
  `major` VARCHAR(50),
  `locationtype` VARCHAR(50),
  `LocationDetail1` VARCHAR(100),
  `LocationDetail2` VARCHAR(100),
  `DayMet` VARCHAR(50),
  `PhoneNumber` VARCHAR(50),
  `SnapchatID` VARCHAR(50),
  `ClothingColor(s)` VARCHAR(200),
  `id` INT NOT NULL,

PRIMARY KEY (`id`)
);

CREATE TABLE `BoulderConnects`.`FoundMatches` (
  `User1` VARCHAR(50),
  `User2` VARCHAR(50),
  `Email1` VARCHAR(50),
  `Email2` VARCHAR(50),
  `Phone1` VARCHAR(50),
  `Phone2` VARCHAR(50),
  `UniqueSearchID` INT NOT NULL AUTO_INCREMENT,

PRIMARY KEY (`UniqueSearchID`)
);
') or die($mysqli->error);

?>
