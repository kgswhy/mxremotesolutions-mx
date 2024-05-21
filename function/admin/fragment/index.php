<?php
require '../../auth_function.php';
require '../../worker_function.php';
require '../../company_function.php';
require '../../job_function.php';

// Memulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa apakah admin telah login
if (!is_admin_logged_in()) {
    // Jika tidak, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
}

$totalCompanies = get_total_companies();
$totalWorkers = get_total_workers();
$totalQuota = get_total_quota();
$totalJobOpportunities = get_total_job_opportunities();
$totalPositions = get_total_positions();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions - Worker List</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Template Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">
    <style>
    /* Atur tinggi maksimum konten agar tidak melewati tinggi layar */
    .container-fluid {
        max-height: calc(100vh - 100px); /* Sesuaikan dengan kebutuhan */
        overflow-y: auto; /* Tambahkan overflow jika konten melebihi tinggi maksimum */
    }

    /* Atur tinggi diagram agar tidak melewati tinggi konten */
    #myChart {
        max-height: calc(100% - 50px); /* Sesuaikan dengan kebutuhan */
    }
</style>
</head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
 
    <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white active">
                        <i class="bi bi-house"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="company.php" class="nav-link text-white">
                        <i class="bi bi-building"></i>
                        Company
                    </a>
                </li>
                <li class="nav-item btn-group">
                    <a href="worker.php" class="btn btn-link nav-link text-white">
                        <i class="bi bi-people"></i>
                        Worker
                    </a>
                    <button type="button"
                        class="btn btn-link nav-link text-white dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="interview.php">Interview</a></li>
                        <li><a class="dropdown-item" href="#">Menu Item 2</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Menu Item 3</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="blog_page.php" class="nav-link text-white">
                        <i class="bi bi-journal"></i>
                        Blog
                    </a>
                </li>
            </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
            <strong>Profile</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<!-- Konten Utama HTML -->
<div class="container-fluid p-4">
    <h1 class="my-4">Statistics</h1>
    <div class="row">
        <!-- Company -->
        <div class="col">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <i class="bi bi-building fs-3 text-primary"></i>
                    <h5 class="card-title">Companies</h5>
                    <p class="card-text">Total: <?php echo $totalCompanies; ?></p>
                </div>
            </div>
        </div>
        <!-- Workers -->
        <div class="col">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <i class="bi bi-people fs-3 text-primary"></i>
                    <h5 class="card-title">Workers</h5>
                    <p class="card-text">Total: <?php echo $totalWorkers; ?></p>
                </div>
            </div>
        </div>
        <!-- Quota -->
        <div class="col">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <i class="bi bi-bar-chart fs-3 text-primary"></i>
                    <h5 class="card-title">Quota</h5>
                    <p class="card-text">Total: <?php echo $totalQuota; ?></p>
                </div>
            </div>
        </div>
        <!-- Job Opportunities -->
        <div class="col">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <i class="bi bi-briefcase fs-3 text-primary"></i>
                    <h5 class="card-title">Job Opportunities</h5>
                    <p class="card-text">Total: <?php echo $totalJobOpportunities; ?></p>
                </div>
            </div>
        </div>
        <!-- Positions -->
        <div class="col">
            <div class="card border-0 rounded-3">
                <div class="card-body">
                    <i class="bi bi-person-lines-fill fs-3 text-primary"></i>
                    <h5 class="card-title">Positions</h5>
                    <p class="card-text">Total: <?php echo $totalPositions; ?></p>
                </div>
            </div>
        </div>
    </div>
<!-- List Company -->
<div class="row mt-5">
    <div class="col">
        <h2>List of Companies</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Company Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Panggil fungsi get_company() untuk mendapatkan daftar perusahaan
                    $companies = get_company();
                    if ($companies) {
                        $count = 1;
                        foreach ($companies as $company) {
                            echo "<tr>";
                            echo "<td>$count</td>";
                            echo "<td>" . $company['name'] . "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='2'>No companies found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- List Worker -->
    <div class="col">
        <h2>List of Workers</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Worker Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Panggil fungsi get_workers() untuk mendapatkan daftar pekerja
                    $workers = get_workers();
                    if ($workers) {
                        $count = 1;
                        foreach ($workers as $worker) {
                            echo "<tr>";
                            echo "<td>$count</td>";
                            echo "<td>" . $worker['fullname'] . "</td>";
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='2'>No workers found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


 
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../lib/wow/wow.min.js"></script>
    <script src="../../../lib/easing/easing.min.js"></script>
    <script src="../../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../js/main.js"></script>
</body>
</html>
