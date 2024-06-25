<?php
require '../../auth_function.php'; // Menggunakan fungsi autentikasi
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi hanya jika belum aktif
}

// Memeriksa apakah admin telah login
if (!is_admin_logged_in()) {
    // Jika tidak, arahkan ke halaman login
    header('Location: ../login.php');
    exit();
}

// Import file dengan fungsi get_company
require '../../company_function.php';

// Tentukan jumlah data per halaman
$items_per_page = 5;

// Ambil halaman saat ini, jika tidak ditentukan, default ke halaman 1
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;

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

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">
    
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
                    <a href="index.php" class="nav-link text-white ">
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
            <div class="dropup">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i>
                    <strong>Profile</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="./change_password.php">Change Password</a></li>
                    <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>


    <!-- Main Content -->
        <div class="container-fluid p-4" style="overflow-x: auto; height: 100vh">
            <h1 class="my-4">List of Companies</h1>
            <div class="table-responsive">
                <table id="companyTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>ID</th>
                            <th>Website</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>PIC Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($companies as $company): ?>
                        <tr>
                            <td>
                                <?php if (!empty($company['logo'])): ?>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#companyModal_<?php echo $company['id']; ?>">
                                    See Logo Image
                                </button>
                                <div class="modal fade" id="companyModal_<?php echo $company['id']; ?>" tabindex="-1"
                                    aria-labelledby="companyModalLabel_<?php echo $company['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="companyModalLabel_<?php echo $company['id']; ?>">
                                                    <?php echo $company['name']; ?> Logo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo $company['logo']; ?>" alt="Company Logo"
                                                    style="max-width: 100%; height: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <span>No logo available</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $company['name']; ?></td>
                            <td><?php echo $company['id']; ?></td>
                            <td>
                                <?php if (!empty($company['website'])): ?>
                                <a href="<?php echo $company['website']; ?>" target="_blank"
                                    class="btn btn-primary">Visit Website</a>
                                <?php else: ?>
                                <span>No website available</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $company['address']; ?></td>
                            <td><?php echo $company['phone']; ?></td>
                            <td><?php echo $company['pic_name']; ?></td>
                            <td>
                                <a href="./job_opportunity.php?id=<?php echo $company['id']; ?>"
                                    class="btn btn-primary">Job Opportunities</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#companyTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": '<i class="bi bi-chevron-left"></i>',
                        "next": '<i class="bi bi-chevron-right"></i>'
                    }
                }
            });
        });
    </script>
</body>

</html>

