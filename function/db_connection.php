<?php
// db_connection.php
$host = 'localhost';
$dbname = 'mx';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Logging untuk mengonfirmasi koneksi berhasil
    error_log("Successfully connected to the database.");

} catch (PDOException $e) {
    error_log("Could not connect to the database: " . $e->getMessage());
    die("Could not connect to the database.");
}
