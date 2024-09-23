<?php
$servername = "localhost";
$username = "msu_user";
$password = "pa55word";

try {
    $conn = new PDO("mysql:host=$servername;dbname=midterm_exam_db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>