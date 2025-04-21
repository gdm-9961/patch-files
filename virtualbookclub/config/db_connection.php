<?php
// db_connection.php

// Database connection details
$dbhost = 'localhost';  // MySQL server address (localhost for local server)
$dbuser = 'root';       // Your MySQL username
$dbpasswd = 'jrb123418!';         // Your MySQL password (if empty, leave as '')
$dbname = 'vbc';        // Your phpBB database name

// Create a new MySQLi connection
$conn = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
