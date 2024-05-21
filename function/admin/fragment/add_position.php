<?php

require '../../position_function.php'; // Ganti dengan file koneksi database Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memastikan bahwa nama posisi telah disertakan dalam permintaan POST
    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        // Panggil fungsi untuk menambahkan posisi baru
        var_dump($name);
        if (add_position($name)) {
            // Jika berhasil, redirect kembali ke halaman position_table.php
            header("Location: position_table.php");
            exit();
        } else {
            // Jika gagal, tampilkan pesan kesalahan
            echo "Failed to add position!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add New Position - MX Remote Solutions</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid p-4">
        <h1 class="my-4">Add New Position</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Position Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../../js/main.js"></script>
</body>

</html>
