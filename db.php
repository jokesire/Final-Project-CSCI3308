<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'aekdb';
$db = 'BoulderConnects';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
