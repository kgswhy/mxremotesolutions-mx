<?php
require 'db_connection.php';  // Pastikan koneksi ke database
require  'utilities.php';     // Fungsi utilitas untuk membersihkan data

function get_contacts() {
    global $pdo;

    $stmt = $pdo->prepare('SELECT id, name, email, subject, phone, message FROM contact');
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertContactData($pdo, $name, $email, $subject, $message) {
    $sql = "INSERT INTO contact (name, email, subject, message) 
            VALUES (:name, :email, :subject, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
    ':message' => $message
    ]);
}


?>