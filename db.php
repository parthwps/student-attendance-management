<?php

$host = "localhost";
$dbname = "student-attendance-management";
$user = "root";
$password = "";

try {
    // Connect to MySQL database using PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
