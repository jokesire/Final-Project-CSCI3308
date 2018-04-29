<?php
/* Database connection settings */
// $host = '127.0.0.1'; CORY
$host = 'localhost';
$user = 'root';
// $pass = '$SQ9184194606'; CORY
$pass = 'Qn9tvCerg4xxfqpn';
$db = 'BoulderConnects';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
