<?php
// Aktifkan laporan kesalahan PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pastikan bahwa data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require './worker_function.php';

    try {
        $result = register_worker($_POST, $_FILES);

        if ($result === true) {
            // Jika berhasil, kirim respons JSON
            echo "<script>alert('Registration successful!');</script>";
            echo "<script>window.location = '../registerworker.php';</script>";
        } else {
           
        }
    } catch (Exception $e) {
        // Tangani pengecualian dan tampilkan pesan kesalahan dengan alert dan kembalikan ke halaman sebelumnya
        echo "<script>alert('Worker registration failed. Exception: " . htmlspecialchars($e->getMessage()) . "');</script>";
        echo "<script>window.history.back();</script>";
    }
}
?>
