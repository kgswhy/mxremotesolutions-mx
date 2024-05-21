<?php
require '../../auth_function.php'; // Menggunakan fungsi autentikasi
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi hanya jika belum aktif
}

// Memeriksa apakah admin telah login
if (!is_admin_logged_in()) {
    // Jika tidak, arahkan ke halaman login
    header("Location: ../login.php");
    exit();
}

// Import file dengan fungsi get_company
require '../../company_function.php';

// Tentukan jumlah data per halaman
$items_per_page = 5;

// Ambil halaman saat ini, jika tidak ditentukan, default ke halaman 1
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Hitung offset untuk query database
$offset = ($current_page - 1) * $items_per_page;

// Ambil data perusahaan untuk halaman saat ini
$companies = get_company_with_pagination($items_per_page, $offset);

// Hitung jumlah total data
$total_companies = get_total_company_count();

// Hitung jumlah halaman
$total_pages = ceil($total_companies / $items_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MX Remote Solutions - Company List</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../../img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">
    <style>
        .company-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
        }
        .company-logo {
            max-width: 400px;
            max-height: 200px;
            margin-bottom: 10px;
            align-items: center;
        }
        .main-content {
            overflow-y: auto; /* Tambahkan properti overflow-y untuk membuat konten dapat di-scroll */
            height: calc(100vh - 56px); /* Sesuaikan tinggi dengan tinggi viewport dikurangi tinggi navbar */
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    
   
    <div class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">
                        <i class="bi bi-house"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="company.php" class="nav-link text-white active">
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

    <div class="main-content">
        <div class="container">
            <h1 class="my-4">List of Companies</h1>
            <?php foreach ($companies as $company): ?>
            <div class="company-card">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo $company['logo']; ?>" alt="Company Logo" class="company-logo">
                    </div>
                    <div class="col-md-9">
                        <h3><?php echo $company['name']; ?></h3>
                        <p><strong>ID:</strong> <?php echo $company['id']; ?></p>
                        <p><strong>Website:</strong> <a href="<?php echo $company['website']; ?>" target="_blank"><?php echo $company['website']; ?></a></p>
                        <p><strong>Address:</strong> <?php echo $company['address']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $company['phone']; ?></p>
                        <p><strong>PIC Name:</strong> <?php echo $company['pic_name']; ?></p>
                        <a href="./job_opportunity.php?id=<?php echo $company['id']; ?>" class="btn btn-primary">Job Opportunities</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
