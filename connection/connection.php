<?php
// Create connection
$conn = new mysqli("localhost", "root", "123qwerty", "wig_db");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>