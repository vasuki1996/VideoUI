<?php
session_start();
$servername = "localhost";
$username = "dbadmin";
$password = "Vasu@1996";
$dbname = "dexdrone_onsite";
$message = "Login Succesful !";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$user = $_POST[''];
$password = $_POST[''];