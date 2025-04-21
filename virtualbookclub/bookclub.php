<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to your separate book database
include 'config/custom_db.php';

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
} else {
    echo "✅ Connected to custom database successfully!<br>";
}

// Example query to get books
$sql = "SELECT clubName, description FROM bookClub";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "✅ Got results from book_clubs:<br>";
    while($row = $result->fetch_assoc()) {
        echo "<strong>" . htmlspecialchars($row['clubName']) . "</strong><br>";
        echo "<em>" . htmlspecialchars($row['description']) . "</em><br><br>";
    }
    
} else {
    echo "⚠️ No results or table doesn't exist.";
}


$conn->close();
?>
