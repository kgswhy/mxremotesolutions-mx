<?php

// Tentukan kunci enkripsi
$encryption_key = 'mxremotesolutions';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Pastikan bahwa data dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../../worker_function.php';

    $worker_id = isset($_POST['worker_id']) ? (int) $_POST['worker_id'] : null;

    if ($worker_id === null || $worker_id === 0) {
        echo "<script>alert('Invalid worker ID: $worker_id');</script>";
    }

    try {
        // Ambil data pekerja dari POST dan FILES
        $result = update_worker($_POST, $_FILES);

        // Cek hasil pembaruan
        if ($result['success']) {
            // Jika berhasil, kirim respons dan alihkan kembali ke halaman sebelumnya
            echo "<script>alert('Update successful! : $worker_id');</script>";
            echo '<script>window.history.back();</script>';
        } else {
            // Jika gagal, tampilkan pesan kesalahan
            echo "<script>alert('Update failed: " . htmlspecialchars($result['error']) . "');</script>";
            echo '<script>window.history.back();</script>';
        }
    } catch (Exception $e) {
        // Tangani pengecualian dan tampilkan pesan kesalahan
        echo "<script>alert('Worker update failed. Exception: " . htmlspecialchars($e->getMessage()) . "');</script>";
        echo '<script>window.history.back();</script>';
    }
}
?>
