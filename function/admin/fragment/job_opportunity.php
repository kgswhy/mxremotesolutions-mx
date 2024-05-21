<?php
require_once '../../job_function.php'; // Pastikan jalur benar

// Mendapatkan company_id dari parameter GET dan memeriksa validitasnya
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $company_id = (int)$_GET['id']; // Konversi ke integer
} else {
    echo "<script>alert('Invalid company ID'); window.location.href='company_list.php';</script>";
    exit();
}

// Mengambil data job opportunities berdasarkan company_id menggunakan fungsi
$job_opportunities = get_job_opportunities_by_company_id($company_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Job Opportunities for Company</title>
    <link href="../../../css/bootstrap.min.css" rel="stylesheet"> <!-- Jalur ke Bootstrap -->
    <link href="../../../css/style.css" rel="stylesheet">       <!-- Gaya khusus -->
</head>
<body>
<div class="container mt-3">
    <a href="./company.php" class="btn btn-secondary">Back to Company List</a>
</div>

    <div class="container mt-5">
        <h2>Job Opportunities</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Quota</th>
                    <th>Job Level ID</th>
                    <th>Requirement</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($job_opportunities) { // Periksa apakah data ada
                    foreach ($job_opportunities as $job) {
                        echo "<tr>";
                        echo "<td>{$job['position_name']}</td>";
                        echo "<td>{$job['quota']}</td>";
                        echo "<td>{$job['job_level_name']}</td>";
                        echo "<td>{$job['requirement']}</td>";
                        echo "<td>{$job['description']}</td>";
                        echo "</tr>";
                    }
                } else {
                    // Jika tidak ada data, tampilkan pesan fallback
                    echo "<tr><td colspan='5'>No job opportunities found for this company.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Pustaka JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap -->
</body>
</html>
