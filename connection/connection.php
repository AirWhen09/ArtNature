<?php
// Create connection
$conn = new mysqli("localhost", "root", "123qwerty", "artnature_db");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $dbhost = "localhost";
// $dbuser = "id19412467_artnature";
// $dbpass = "123!@#Qwerty";
// $dbname = "id19412467_artnaturedb";

// if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
// {
// 	die("failed to connect!");
// }

?>