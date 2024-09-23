<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// Set PDO to throw exceptions on error
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; // For testing purposes
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
