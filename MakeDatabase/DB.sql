CREATE SCHEMA `boulderconnects` ;

CREATE TABLE `BoulderConnects`.`LoginInfo`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(50) NOT NULL,
     `last_name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,


PRIMARY KEY (`id`)
);

CREATE TABLE `BoulderConnects`.`myevents`
(
   `email` VARCHAR(100) NOT NULL,
   `first_name` VARCHAR(50) NOT NULL,
   `last_name` VARCHAR(50) NOT NULL,
    `eventname` VARCHAR(50),
    `date` VARCHAR(50),
    `eventtype` VARCHAR(100) ,
    `locationdescription` VARCHAR(100),
    `additionalinfo` VARCHAR(100),
    `nickname` VARCHAR(50),
    `hat` VARCHAR(50),
    `glasses` VARCHAR(50),
    `hair` VARCHAR(50),
    `haircolor` VARCHAR(50),
    `shirt` VARCHAR(50),
    `shirtcolor` VARCHAR(50),
    `eventid` INT NOT NULL auto_increment,

PRIMARY KEY (`eventid`)
);


CREATE TABLE `BoulderConnects`.`activesearches` (
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
   `eventname` VARCHAR(50),
   `date` VARCHAR(50),
   `eventtype` VARCHAR(100) ,
   `locationdescription` VARCHAR(100),
   `additionalinfo` VARCHAR(100),
   `nickname` VARCHAR(50),
   `hat` VARCHAR(50),
    `glasses` VARCHAR(50),
   `hair` VARCHAR(50),
   `haircolor` VARCHAR(50),
   `shirt` VARCHAR(50),
   `shirtcolor` VARCHAR(50),
  `searchid` INT NOT NULL auto_increment,

PRIMARY KEY (`searchid`)
);



CREATE TABLE `BoulderConnects`.`matches` (
  `User1` VARCHAR(50),
  `User2` VARCHAR(50),
  `Email1` VARCHAR(50),
  `Email2` VARCHAR(50),
  `MatchID` INT NOT NULL AUTO_INCREMENT,

PRIMARY KEY (`MatchID`)
);
