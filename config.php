<?php
// Set the default time zone to London
date_default_timezone_set('Europe/London');

// Database connection details
$hostname = 'localhost';
$username = 'abradu';
$password = 'audiomasta12z';
$database = 'passonetouch';

try {
    // Establish PDO connection
    $conn = new PDO("mysql:host=$hostname; dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optional: Set MySQL time zone (optional if you want to sync with the database)
    $conn->exec("SET time_zone = '+00:00'");  // London time (UTC+0)

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
