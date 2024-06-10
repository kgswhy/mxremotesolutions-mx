<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Example App</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../../css/bootstrap.min.css" rel="stylesheet"> <!-- Jalur ke Bootstrap -->
    <link href="../../css/style.css" rel="stylesheet"> <!-- Gaya khusus jika diperlukan -->
    <style>
        .login-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card"> <!-- Menggunakan card untuk tampilan login -->
                    <h2 class="card-title text-center mb-4">Login</h2>
                    <form method="post" action="../login_admin.php">
                        <?php if (isset($_GET['error_message'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['error_message']; ?>
                        </div>
                        <?php endif; ?> <!-- Arahkan ke skrip backend -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                            <!-- Wajib diisi -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <!-- Wajib diisi -->
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button> <!-- Tombol kirim -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Pustaka JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
