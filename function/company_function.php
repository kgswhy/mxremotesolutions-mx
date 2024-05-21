<?php
require 'db_connection.php';

/**
 * Fungsi untuk mendapatkan daftar perusahaan
 * 
 * @return array|null Mengembalikan array dengan daftar perusahaan atau null jika tidak ada
 */
function get_company() {
    global $pdo; // Menggunakan koneksi PDO yang telah disiapkan

    try {
        // Query untuk mendapatkan semua perusahaan dari tabel 'company'
        $sql = "SELECT * FROM company";
        $stmt = $pdo->prepare($sql);

        // Eksekusi query
        $stmt->execute();

        // Ambil semua hasil sebagai array asosiatif
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $companies; // Mengembalikan daftar perusahaan
    } catch (PDOException $e) {
        // Jika terjadi kesalahan, log dan kembalikan null
        error_log("Error fetching companies: " . $e->getMessage());
        return null; // Mengindikasikan kesalahan atau tidak ada data
    }
}

/**
 * Fungsi untuk mendapatkan daftar perusahaan dengan pagination
 * 
 * @param int $limit Jumlah perusahaan yang akan diambil
 * @param int $offset Offset untuk query data
 * @return array|null Mengembalikan array dengan daftar perusahaan atau null jika tidak ada
 */
function get_company_with_pagination($limit, $offset) {
    global $pdo; // Menggunakan koneksi PDO yang telah disiapkan

    try {
        // Query untuk mendapatkan sebagian data perusahaan dari tabel 'company'
        $sql = "SELECT * FROM company LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Eksekusi query
        $stmt->execute();

        // Ambil semua hasil sebagai array asosiatif
        $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $companies; // Mengembalikan daftar perusahaan
    } catch (PDOException $e) {
        // Jika terjadi kesalahan, log dan kembalikan null
        error_log("Error fetching companies with pagination: " . $e->getMessage());
        return null; // Mengindikasikan kesalahan atau tidak ada data
    }
}

/**
 * Fungsi untuk menghitung total jumlah perusahaan
 * 
 * @return int|null Mengembalikan jumlah total perusahaan atau null jika terjadi kesalahan
 */
function get_total_company_count() {
    global $pdo; // Menggunakan koneksi PDO yang telah disiapkan

    try {
        // Query untuk menghitung jumlah total perusahaan
        $sql = "SELECT COUNT(*) AS total FROM company";
        $stmt = $pdo->query($sql);

        // Ambil jumlah total sebagai integer
        $total = $stmt->fetchColumn();

        return $total; // Mengembalikan jumlah total perusahaan
    } catch (PDOException $e) {
        // Jika terjadi kesalahan, log dan kembalikan null
        error_log("Error fetching total company count: " . $e->getMessage());
        return null; // Mengindikasikan kesalahan
    }
}

function get_total_companies() {
    global $pdo;

    try {
        $sql = "SELECT COUNT(*) AS total FROM company";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalCompanies = $row['total'];
        return $totalCompanies;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}
