<?php
require 'db_connection.php'; // Koneksi ke database

/**
 * Fungsi untuk mengambil data job_opportunity berdasarkan company_id
 * dan bergabung dengan tabel position_table dan job_level_table untuk mendapatkan detail posisi dan level pekerjaan
 *
 * @param int $company_id ID perusahaan
 * @return array|null Mengembalikan array entri job_opportunity atau null jika tidak ada
 */
function get_job_opportunities_by_company_id($company_id) {
    global $pdo; // Gunakan koneksi database yang ada

    // Memastikan company_id valid
    if (!is_numeric($company_id)) {
        return null;
    }

    $stmt = $pdo->prepare(
        "SELECT jo.*, pt.name AS position_name, jl.name AS job_level_name
         FROM job_opportunity jo
         LEFT JOIN position_table pt ON jo.position_id = pt.id
         LEFT JOIN job_level jl ON jo.job_level_id = jl.id
         WHERE jo.company_id = :company_id"
    );

    $stmt->bindParam(':company_id', $company_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengembalikan semua hasil sebagai array asosiatif
}


// Fungsi untuk mendapatkan jumlah quota
function get_total_quota() {
    global $pdo;

    try {
        $sql = "SELECT SUM(quota) AS total FROM job_opportunity";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalQuota = $row['total'];
        return $totalQuota;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

function get_total_positions() {
    global $pdo;

    try {
        $sql = "SELECT COUNT(*) AS total FROM position_table";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPositions = $row['total'];
        return $totalPositions;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}

function get_total_job_opportunities() {
    global $pdo;

    try {
        $sql = "SELECT COUNT(*) AS total FROM job_opportunity";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalJobOpportunities = $row['total'];
        return $totalJobOpportunities;
    } catch (PDOException $e) {
        error_log("Error: " . $e->getMessage());
        return false;
    }
}
?>
