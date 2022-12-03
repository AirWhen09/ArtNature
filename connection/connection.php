<?php
// Create connection
$conn = new mysqli("localhost", "artnatur_one", "123!@#Qwerty", "artnatur_123");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $dbhost = "localhost";
// $dbuser = "id19412467_myartnature";
// $dbpass = "123!@#Qwerty";
// $dbname = "id19412467_myartnaturedb";

// if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
// {
// 	die("failed to connect!");
// }

?>