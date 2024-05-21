<?php
require 'auth_function.php'; // Meng-include fungsi autentikasi
session_start();            // Memulai sesi

// Memeriksa metode request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (admin_login($email, $password)) {
        // Jika login berhasil, arahkan ke dashboard admin
        header("Location: ./admin/fragment/index.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }
} else {
    // Jika bukan POST, tampilkan pesan kesalahan
    echo "<script>alert('Invalid request method'); window.location.href='login.php';</script>";
}
