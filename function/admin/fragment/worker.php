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

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

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
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Admin Dashboard</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white ">
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
                    <a href="worker.php" class="btn btn-link nav-link text-white active">
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
                <li class="nav-item">
                    <a href="contact.php" class="nav-link text-white">
                        <i class="bi bi-envelope"></i>
                        Contact
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


    <!-- Konten Utama -->
<div class="container-fluid p-4" style="overflow-x: auto; height: 100vh">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6"> <!-- Kolom pertama untuk judul -->
            <h1 class="my-4">List of Workers</h1>
        </div>
        <div class="col-md-6 text-end">
            <div class="d-flex justify-content-end align-items-center">
                <div class="form-group mb-0 me-2">
                    <select id="positionFilter" class="form-select">
                        <option value="">All Positions</option>
                        <?php
                        require '../../position_function.php';
                        $positions = get_positions(); // Assuming this function gets unique positions from the database
                        foreach ($positions as $position) {
                            echo "<option value='{$position['name']}'>{$position['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-0">
                    <select id="statusFilter" class="form-select">
                        <option value="">All Status Worker</option>
                        <?php
                        require '../../getData.php';
                        foreach ($status_workers as $status) {
                            echo "<option value='{$status['name']}'>{$status['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="workerTable" class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Short Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Status Worker</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../../worker_function.php';
                
                $workers = get_workers();
                $counter = 1;
                
                foreach ($workers as $worker) {
                    echo '<tr>';
                    echo "<td>{$counter}</td>";
                    echo "<td>{$worker['fullname']}</td>";
                    echo "<td>{$worker['shortname']}</td>";
                    echo "<td>{$worker['gender_name']}</td>";
                    echo "<td>{$worker['phone']}</td>";
                    echo "<td>{$worker['email']}</td>";
                    echo "<td>{$worker['position_table_name']}</td>";
                    echo "<td>{$worker['status_worker_name']}</td>";
                    echo "<td><a href='./worker_detail.php?id={$worker['id']}' class='btn btn-primary'>Lihat Detail</a></td>";
                    echo '</tr>';
                    $counter++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../lib/wow/wow.min.js"></script>
    <script src="../../../lib/easing/easing.min.js"></script>
    <script src="../../../lib/waypoints/waypoints.min.js"></script>
    <script src="../../../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../js/main.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
        var table = $('#workerTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "pageLength": 5,
        });

        // Filter by position
        $('#positionFilter').on('change', function() {
            var positionName = $(this).val();
            table.column(6).search(positionName).draw(); // assuming position is at 6th column
        });
        $('#statusFilter').on('change', function() {
            var statusName = $(this).val();
            table.column(7).search(statusName).draw(); // assuming position is at 6th column
        });
    });// assuming position is at 6th column
    </script>
</body>

</html>


