<?php
require 'db_connection.php';  // Koneksi ke database
require 'utilities.php';     // Fungsi utilitas untuk sanitasi dan validasi

try {
    // Ambil data dari formulir dan sanitasi
    $name = clean_input($_POST['name']);  // Sanitasi input teks
    $email = validate_email($_POST['email']) ? $_POST['email'] : null;  // Validasi email
    $subject = isset($_POST['subject']) ? clean_input($_POST['subject']) : null;
    $message = clean_input($_POST['message']);  // Sanitasi input teks

    // Memastikan semua field yang wajib telah diisi
    if (!$name || !$email || !$message) {
        throw new Exception("All fields are required except subject.");
    }

    // Pernyataan SQL untuk memasukkan data ke tabel contact
    $sql = "INSERT INTO contact (name, email, subject, message) 
            VALUES (:name, :email, :subject, :message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':subject' => $subject,
        ':message' => $message
    ]);

    // Jika berhasil, arahkan ke halaman dengan pesan sukses
    header("Location: ../contact.html?success=true");
    exit();
} catch (PDOException $e) {
    // Penanganan kesalahan database
    echo "Error: " . $e->getMessage();
} catch (Exception $e) {
    // Penanganan kesalahan lainnya
    echo "Error: " . $e->getMessage();
}
