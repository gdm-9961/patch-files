<?php
$host = 'localhost'; // or your server name
$db = 'virtualbookclub';
$user = 'root';
$pass = 'jrb123418!';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!";
?>
