<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "secureaccessdb";
$con = mysqli_connect($host, $username, $password, $dbname);

if ($con === false) {
	die("ERROR: Could not connect. " . mysqli_connect_error());
}
