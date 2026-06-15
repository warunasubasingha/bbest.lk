<?php
// includes/db.php
// BBest.lk database connection using PDO

$host = "localhost";
$dbname = "bbest_db";
$username = "root";
$password = "";

try {
    $conn = new PDO(
        "mysql:host={$host};dbname={$dbname};charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    // In production, log this error instead of showing it.
    die("Database connection failed.");
}
?>
