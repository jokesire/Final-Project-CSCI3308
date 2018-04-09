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
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ( "anna", "jane" ,"password1", "anna123@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("billy", "joel" ,"password2", "billy456@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("jean", "goel"   ,"password3", "jean891@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("linny","jane" , "password4", "linny181@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("jess", "jane" ,"password5", "jess585@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("jackie", "jane" ,"password6    ", "jackie991@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("nickie", "jane" ,"password7", "nickie141@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
VALUES ("sully", "jane" ,"password8", "sully454@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
 VALUES ("nemo", "jane" ,"password9", "nemo987@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
 VALUES ("dory", "jane" ,"password10", "dory234@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
 VALUES ("vanne", "jane" ,"password11", "vanne142@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
 VALUES ("john", "jane" ,"password12", "john111@colorado.edu");
INSERT INTO BoulderConnects.LoginInfo (first_name , last_name, password, email)
 VALUES ("sammy", "jane" ,"password13", "sammy122@colorado.edu");

CREATE TABLE `BoulderConnects`.`SelfInformation`
(
    `email` VARCHAR(100) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    `nickname` VARCHAR(50),
    `major` VARCHAR(50),
    `locationtype` VARCHAR(100) ,
    `locationdetail1` VARCHAR(100),
    `locationdetail2` VARCHAR(100),
    `daymet` VARCHAR(50),
    `phonenumber` VARCHAR(50),
    `snapchatid` VARCHAR(50),
    `clothingcolor` VARCHAR(200),
    `id` INT NOT NULL auto_increment,

PRIMARY KEY (`id`)
);

INSERT INTO BoulderConnects.SelfInformation ( email , name, major, locationtype , LocationDetail1, daymet ,PhoneNumber,snapchatid, ClothingColor)
VALUES ("nickie141@colorado.edu", "Nick" , "English", "Party", "Frat" , "April 7th" , "303-555-5554" , "billy_snap" ,  "silver" );
INSERT INTO BoulderConnects.SelfInformation ( email , name, major, locationtype , LocationDetail1,LocationDetail2,PhoneNumber)
VALUES ("sully454@colorado.edu" , "Sulivan" , "English", "Class", "Physics" , "1110" , "303-555-5593");
INSERT INTO BoulderConnects.SelfInformation ( email , name, nickname, major, locationtype , LocationDetail1,LocationDetail2, daymet ,PhoneNumber)
VALUES ("vanne142@colorado.edu", "Vanessa" , "Nessa" , "Biology", "Party", "House" , "Sarah's House" , "April 7th" , "303-555-513" );
INSERT INTO BoulderConnects.SelfInformation ( email , name, major, locationtype , LocationDetail1, daymet ,PhoneNumber,snapchatid, ClothingColor)
VALUES ("sammy122@colorado.edu", "Samantha" , "Chemistry", "Other", "Pearl Street" , "April 4th" , "303-555-5552" , "sam_snap" ,  "yellow");
INSERT INTO BoulderConnects.SelfInformation ( email , name, nickname, major, locationtype , LocationDetail1,PhoneNumber,snapchatid)
VALUES ("john111@colorado.edu", "Jonathon" , "John" , "Literature", "Other", "Illegal Petes" , "303-555-5553" , "john_snap");
INSERT INTO BoulderConnects.SelfInformation ( email , name, nickname, major, locationtype , LocationDetail1,PhoneNumber,snapchatid)
VALUES ("john111@colorado.edu", "Jonathon" , "John" , "Literature", "Party", "Frat" , "303-555-5553" , "john_snap" );






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
  `ClothingColor` VARCHAR(200),
  `id` INT NOT NULL auto_increment,

PRIMARY KEY (`id`)
);

INSERT INTO BoulderConnects.searchingfor ( name , nickname , major, locationtype , LocationDetail1, PhoneNumber, ClothingColor)
VALUES ("Jenny", "Jen" , "Computer Science" , "Party", "Frat" ,"303-555-5555" , "blue" );
INSERT INTO BoulderConnects.searchingfor ( name , major, locationtype , LocationDetail1, LocationDetail2, SnapchatID, ClothingColor)
VALUES ("Mike", "Physics" , "Class", "Physics" , "Phys 1110" ,  "mi_ke" , "red" );
INSERT INTO BoulderConnects.SearchingFor ( name , locationtype , LocationDetail1, LocationDetail2, DayMet, ClothingColor)
VALUES ("Paul", "Party", "House" , "Sara's House" , "April 7th" , "red"  );
INSERT INTO BoulderConnects.SearchingFor ( name , locationtype, LocationDetail1, DayMet, PhoneNumber, ClothingColor)
VALUES ("Joe", "Other", "Pearl Street" , "April 4th" , "303-555-5556" ,  "green" );
INSERT INTO BoulderConnects.SearchingFor  ( name , locationtype, LocationDetail1, SnapChatID, ClothingColor) 
VALUES ("Sarah", "Other", "Illegal Pete's" , "sarasnap" ,  "white"  );
INSERT INTO BoulderConnects.SearchingFor ( name , locationtype, LocationDetail1, SnapChatID, ClothingColor)
VALUES ("Amanda", "Party", "Frat" , "amanda_snap" ,  "silver" );



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

INSERT INTO boulderconnects.foundmatches (User1 , User2, Email1, Email2, Phone1 , Phone2, UniqueSearchID)
VALUES ("anna123", "billy456", "anna123@colorado.edu", "billy456@colorado.edu", "720-123-4567", "303-123-4567", "102938");
INSERT INTO boulderconnects.foundmatches (User1 , User2, Email1, Email2, Phone1 , Phone2, UniqueSearchID)
VALUES ("jean891", "jess585", "815-123-4567", "719-123-4567", "jean891@colorado.edu", "jess585@colorado.edu", "162534");
INSERT INTO boulderconnects.foundmatches (User1 , User2, Email1, Email2, Phone1 , Phone2, UniqueSearchID)
VALUES ("jackie991", "linny181", "jackie991@colorado.edu", "linny181@colorado.edu", "719-987-6543", "303-987-6543", "119928");
INSERT INTO boulderconnects.foundmatches (User1 , User2, Email1, Email2, Phone1 , Phone2, UniqueSearchID)
VALUES ("nemo987", "dory234", "nemo987@colorado.edu", "dory234@colorado.edu", "720-654-9876", "719-123-4453", "675849");
