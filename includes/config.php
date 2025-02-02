<?php
$host = "localhost";
$user = "root"; // Change if using a different user
$password = ""; // Change if you set a password
$database = "church_choir";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
