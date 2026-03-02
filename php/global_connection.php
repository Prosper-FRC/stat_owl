<?php
// Database connection details


$host = 'localhost';
$dbname = 'prospfv0_frc_scouting';
$username = 'prospfv0_scout_owl';
$password = 'BlueHawks2025!';



try {
    // Create a PDO instance to connect to the database
    $pdo2 = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    die("Database connection failed: " . $e->getMessage());
}
?>
