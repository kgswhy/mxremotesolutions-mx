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

   <div class="container text-center mt-5">
        <h1>Access Denied</h1>
        <p>You do not have permission to access this page.</p>
        <a href="./index.php" class="btn btn-primary">Back</a>
    </div>
       


   
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

