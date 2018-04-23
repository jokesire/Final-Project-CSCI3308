<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '$SQ9184194606';
$db = 'BoulderConnects';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
