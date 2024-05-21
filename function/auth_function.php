<?php
require 'db_connection.php'; // Koneksi ke database
require 'utilities.php';    // Untuk pembersihan input dan validasi lainnya
session_start();            // Memulai sesi jika diperlukan

/**
 * Fungsi untuk login admin
 *
 * @param string $email Email admin
 * @param string $password Kata sandi admin
 * @return bool Apakah login berhasil
 */
function admin_login($email, $password) {
    global $pdo; // Gunakan koneksi database yang ada

    $email = validate_input($email);  // Bersihkan input
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);  // Dapatkan hasil sebagai array asosiatif

    if ($admin && password_verify($password, $admin['password'])) {
        // Jika login berhasil, simpan status login di sesi
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];
        return true; // Login berhasil
    } else {
        return false; // Login gagal
    }
}

/**
 * Fungsi untuk logout admin
 */
function admin_logout() {
    session_unset(); // Menghapus semua variabel sesi
    session_destroy(); // Menghancurkan sesi
    header("Location: ../index.html"); // Arahkan ke halaman login
    exit();
}

/**
 * Fungsi untuk memeriksa apakah admin telah login
 *
 * @return bool True jika admin telah login, False jika belum
 */
function is_admin_logged_in() {
    return isset($_SESSION['admin_id']); // Cek apakah sesi admin_id ada
}
