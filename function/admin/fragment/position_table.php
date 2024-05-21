<?php

require '../../auth_function.php'; // Menggunakan fungsi autentikasi
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi hanya jika belum aktif
}
// Memulai sesi

// Memeriksa apakah admin telah login
if (!is_admin_logged_in()) {
    // Jika tidak, arahkan ke halaman login
    header('Location: ../login.php');
    exit();
}

require '../../position_function.php'; // Ganti dengan file koneksi database Anda

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
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
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
                    <a href="company.php" class="nav-link text-white">
                        <i class="bi bi-building"></i>
                        Company
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white active" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-badge"></i> <!-- Ganti dengan ikon yang sesuai -->
                        Worker
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="position_table.php">Position Table</a></li>
                        <li><a class="dropdown-item" href="job_level.php">Job Level</a></li>
                        <li><a class="dropdown-item" href="education_level.php">Education Level</a></li>
                    </ul>
                </li>

                <!-- Item lain sesuai kebutuhan -->
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

        <!-- Konten Utama -->
        <div class="container-fluid p-4" style="overflow-y: auto;">
            <h1 class="my-4">List of Positions</h1>
            <a href="add_position.php" class="btn btn-primary mb-3">Add New Position</a>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $positions = get_positions();
                        foreach ($positions as $position) {
                            echo "<tr>";
                            echo "<td>{$position['id']}</td>";
                            echo "<td>{$position['name']}</td>";
                            echo "<td>
                                    <a href='edit_position.php?id={$position['id']}' class='btn btn-primary'>Edit</a>
                                    <button class='btn btn-danger' onclick='deletePosition({$position['id']})'>Delete</button>
                                  </td>";
                            echo "</tr>";
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

    <script>
        // Fungsi untuk menghapus posisi
        function deletePosition(positionId) {
            if (confirm("Are you sure you want to delete this position?")) {
                // Lakukan sesuatu dengan ID posisi yang diberikan
                alert("Delete position with ID: " + positionId);
            }
        }
    </script>
</body>

</html>
